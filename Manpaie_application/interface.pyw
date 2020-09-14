# -*- coding: utf-8 -*-
"""
Created on Thu May 28 18:14:14 2020

@author: hibatou allah boulsane
"""


import smtplib
from email.message import EmailMessage

import pdfplumber
import os 
from PyPDF2 import PdfFileReader,PdfFileWriter,PdfFileMerger
from datetime import date

from selenium import webdriver
from selenium.common.exceptions import NoSuchElementException
from time import sleep


import pandas as pd
from tkinter import *
from tkinter import filedialog
from PIL import ImageTk, Image

""" ********************************** split files ****************************************** """
def decouper(path):
    pdfR = PdfFileReader(path,'rb')
  
    listematricule = []
   
    with pdfplumber.open(path) as pdf:
        
        print("")
        for k in range(pdfR.getNumPages()):
            first_page = pdf.pages[k]
            text = first_page.extract_text()
            devisionchaine = text.split(" ")
            matriculeString = ""
            mat = " "
            matricule = 0
            NOM = " "
            PRENOM = " "
            for j in range(len(devisionchaine)):
                if("Fax" in devisionchaine[j]):
                   mat = devisionchaine[j+1]
                   N =str(mat).split("\n")
                   NOM = N[1]
                   mat = devisionchaine[j+2]
                   N =str(mat).split("\n")
                   PRENOM = N[0]
                  
                if("Salarié" in devisionchaine[j]):
                   mat = devisionchaine[j+3]
                   matriculeString =str(mat).split("\n")
                   matricule = matriculeString[0]
                   writer= PdfFileWriter()
                   writer.addPage(pdfR.getPage(k))
                   output = f'split/{matricule}{NOM}{PRENOM}{k}.pdf'
                   with open(output,'wb') as out:
                       writer.write(out)
            listematricule.append(matricule)
             
    mergefiles(listematricule) 
 
       
""" ********************************** merge files ****************************************** """                     
def mergefiles(liste):
  
     dictsamemat = {}
     fichiers=os.listdir('split/')
     for matt in liste:
         sameMatricule = []
         for file in fichiers:
             with pdfplumber.open(f'split/{file}') as pdf:
                first_page = pdf.pages[0]
                text = first_page.extract_text()
                devisionchaine = text.split(" ")
                matriculeString = ""
                mat = " "
                matricule = 0
                NOM = " "
                PRENOM = " "
                for j in range(len(devisionchaine)):
                    if("Fax" in devisionchaine[j]):
                       mat = devisionchaine[j+1]
                       N =str(mat).split("\n")
                       NOM = N[1]
                       mat = devisionchaine[j+2]
                       N =str(mat).split("\n")
                       PRENOM = N[0]
                    if("Salarié" in devisionchaine[j]):
                       mat = devisionchaine[j+3]
                       matriculeString =str(mat).split("\n")
                       matricule = matriculeString[0]
                       if matt == matricule:
                          sameMatricule.append(f'split/{file}')
                          sameMatricule.append(NOM+PRENOM)
         dictsamemat[matt] = sameMatricule
   
     
     for matn in dictsamemat:
      
         pdfs = dictsamemat[matn]
         merger = PdfFileMerger()
        
        
         if  len(pdfs) > 2:
             print(matn)
             print("========")
             for i in range(0,len(pdfs),2):
                print("File :")
                print(pdfs[i])
                merger.append(pdfs[i])
             
             merger.write(f'split/{matn}_{pdfs[1]}.pdf')
             print("***************************************************************")
             merger.close()
         
     for matn in dictsamemat:
         pdfs = dictsamemat[matn] 
         if  len(pdfs) > 2:
             for i in range(0,len(pdfs),2):
                os.remove(pdfs[i])                    
ListeGlobale=[]
""" ********************************** retrieve information ****************************************** """
def recupererinfo(excel_file):
    Globale = []
    fichiers=os.listdir('split/')
    for file in fichiers:
        with pdfplumber.open(f'split/{file}') as pdf:
            first_page = pdf.pages[0]
            text = first_page.extract_text()
            devisionchaine = text.split(" ")
            nomfichier = file 
            nomprenom = " "  
            for j in range(len(devisionchaine)):
             
                if("Salarié" in devisionchaine[j]):
                       mat = devisionchaine[j+3]
                       matriculeString =str(mat).split("\n")
                       matricule = matriculeString[0]
                       df = pd.read_excel(excel_file)
                       for x in df.itertuples():
                           if x.MATRICULE == int(matricule): 
                                nomprenom = x.NOMPRENOM
                                tel = x.TEL
                                email = x.EMAIL
            if  nomprenom != " " :
                Liste= [nomfichier,matricule,nomprenom,email,tel]
                Globale.append(Liste)
            
    return Globale
     
""" ********************************** Sending mails****************************************** """

def sendmailgmail(subject,excel,EMAIL_ADDRESS,EMAIL_PASSWORD,MESSAGE):
    contacts =recupererinfo(excel) 
    for contact in contacts:
        print(type(contact[3]))
        if str(contact[3]) != "nan": 
           
            msg = EmailMessage()
            msg['Subject'] = subject
            msg['From'] = EMAIL_ADDRESS
            msg['To'] = contact[3]
            
            msg.set_content('This is a plain text email')
            with open(f'split/{contact[0]}','rb') as f:
                file_data = f.read()
                file_name = f.name
            msg.add_alternative("""\
            <!DOCTYPE html>
            <html>
                <body>
                    <p>Bonjour M. <FONT color="black" face="arial"><I><B>"""+ contact[2]+"""</B></I></FONT></p>
                    <p>"""+ MESSAGE+"""</p>
                </body>
            </html>
            """, subtype='html')
            msg.add_attachment(file_data,maintype= 'file',subtype = 'pdf',filename = file_name)
           
            with smtplib.SMTP_SSL('smtp.gmail.com', 465) as smtp:
                smtp.login(EMAIL_ADDRESS, EMAIL_PASSWORD)
                smtp.send_message(msg)
            print("Email envoyé à ",contact[3])
         
        
""" ********************************** Sending via whatsapp ****************************************** """        
def sendmailwhatsapp(path,pdfs):
    contacts =recupererinfo(path) 
    driver = webdriver.Chrome()
    driver.get('https://web.whatsapp.com/')
    #notin variable pour le garde fou chat si on est dans la zone chat 
    notin = 0
    for contact in contacts:
        try:
           print(contact[1])
           if str(contact[1]) != "nan" :    
                name = contact[1]
                filepath = f'{pdfs}\{contact[0]}'
                print("Im in")
                sleep(6)
                if notin == 0:
                    driver.find_element_by_css_selector('span[data-icon="chat"]').click() 
                checheruser = driver.find_element_by_xpath("//div[contains(@class, '_3FRCZ copyable-text selectable-text')]")
                checheruser.send_keys(name) 
                checheruser.click()
                sleep(3)
                user = driver.find_element_by_xpath('//span[@title = "{}"]'.format(name))
                user.click()
               
                
                driver.find_element_by_css_selector('span[data-icon="clip"]').click()
                # add file to send by file path
                attach=driver.find_element_by_css_selector('input[type="file"]')
                attach.send_keys(filepath) 
                sleep(6)
                #send=driver.find_element_by_xpath("//div[contains(@class, 'yavlE')]").click()
                driver.find_element_by_css_selector('span[data-icon="send"]').click()
                notin = 0
               
        except NoSuchElementException:
            print("echec d'envoie à ",contact[1])
            sleep(6)
            send=driver.find_element_by_xpath("//button[contains(@class, 'MfAhJ')]").click()
            notin= 1
            pass
        
""" ********************************** main ****************************************** """ 
window = Tk()

window.title("Acceuil")
window.geometry("1000x550")
window.minsize(1200,700)
window.iconbitmap("logo.ico")
window.config(background='#f0f0f0')
              
              
frame = Frame(window,bg='#f0f0f0')

text = Text(window)
L1 = Label(frame, text = "Email:",font=("Courrier",10),bg='#f0f0f0',fg='black')
E1 = Entry(frame,width = 40)
L2 = Label(frame, text = "Mot de passe :",font=("Courrier",10),bg='#f0f0f0',fg='black')                      
E2 = Entry(frame,width = 40)
L3 = Label(frame, text = "Objet:",font=("Courrier",10),bg='#f0f0f0',fg='black')
E3 = Entry(frame,width = 40)
L4 = Label(frame, text = "Message:",font=("Courrier",10),bg='#f0f0f0',fg='black')                      
E4 = Entry(frame,width = 40)
""" *********************** function to call sendmails function ************************* """ 
def Appelsendgmail():
    EMAIL = " "
    PASSWORD = " "

    if EMAIL == " ":
        EMAIL = E1.get()
        PASSWORD = E2.get()
        subject = E3.get()
        MESSAGE = E4.get()
        L1.destroy()
        E1.destroy()
        L2.destroy()
        E2.destroy()
        L3.destroy()
        E3.destroy()
        L4.destroy()
        E4.destroy()
        Submit.destroy()
    window.filename = filedialog.askopenfilename(initialdir="/", title="Selectionner le fichier excel", filetypes=(("xlsx files", "*.xlsx"),("all files", "*.*")))
    path = window.filename 
    text.insert(INSERT, "*******************************Fin d'envoi Email*******************************")
    text.pack()
    sendmailgmail(subject,path,EMAIL,PASSWORD,MESSAGE)
    
Submit = Button(frame,text="Envoyer",font=("Courrier",10),bg='#984807',fg='white',command=Appelsendgmail)

""" *********************** function to call decouper function ************************* """ 
def decouperinterface():
    window.filename = filedialog.askopenfilename(initialdir="/", title="Selectionner le fichier pdf", filetypes=(("pdf files", "*.pdf"),("all files", "*.*")))
    path = window.filename 
    text.insert(INSERT, "*******************************Fin de découpage*********************************")
    text.pack()
    decouper(path)
""" *********************** function to enter your email and password ************************* """    
def sendgmail():
    L1.pack()
    E1.pack(fill=X)
    L2.pack()
    E2.pack(fill=X)
    L3.pack()
    E3.pack(fill=X)
    L4.pack()
    E4.pack(fill=X)
    Submit.pack(pady=10,fill=X)

""" *********************** function to call sendviawhats function ************************* """   
def sendwhats():
    window.filename = filedialog.askopenfilename(initialdir="/", title="Selectionner le fichier excel", filetypes=(("xlsx files", "*.xlsx"),("all files", "*.*")))
    path = window.filename
    window.filename = filedialog.askdirectory()
    dossier = window.filename
    sendmailwhatsapp(path,dossier)
    text.insert(INSERT, "*******************************Fin d'envoi whatsapp****************************")
    text.pack()

image = ImageTk.PhotoImage(Image.open("logo1.png"))
label_image = Label(image=image,width= 300 ,height=100)
label_image.pack(side = "top", anchor=NW,pady=5)
label_title = Label(frame,text="MANPAIE",font=("Bell MT ",30),bg='#f0f0f0',fg='#042c62')
label_title.pack(pady=10,fill=X)
decouper_button = Button(frame,text="Découper le fichier ",font=("Courrier",20),bg='#984807',fg='white',command=decouperinterface)
decouper_button.pack(pady=10,fill=X)


send_button_gmail = Button(frame,text="Envoyer via gmail",font=("Courrier",20),bg='#984807',fg='white',command=sendgmail)
send_button_gmail.pack(pady=10,fill=X)

send_button_whatsapp = Button(frame,text="Envoyer via whatsapp",font=("Courrier",20),bg='#984807',fg='white',command=sendwhats)
send_button_whatsapp.pack(pady=10,fill=X)
                       
frame.pack(expand=YES)
window.mainloop()


    