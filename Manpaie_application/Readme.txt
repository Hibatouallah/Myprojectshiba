Etape 1: 
pr�requis: python 3
il faut installer les modules suivants:
taper dans la ligne de commande (cmd):
  -pip install smtplib
  -pip install pdfplumber
  -pip install PyPDF2
  -pip install selenium
  -pip install pandas
  -pip install tkinter
Etape 2:
Adapter les chemins des fichiers pdf et excel:
  -Dans le fichier sendmail.py 
      *changer la variable path*
      *changer la variable excel_file*
      *Ajouter votre EMAIL_ADDRESS et EMAIL_PASSWORD*
      *changer la variable filepath*
Etape 3:
d�marrer l'application dans L'invite de commande par la requete ci-dessous:
acc�der � l'emplacement de l'application dans mon cas j'ai fait:
cd C:\xampp\htdocs\Gpaix
apr�s taper la commande suivante: python interface.py
1- cliquer sur d�couper votre ficher pdf .(les bulletins de pais s�par�s se trouvent dans le dossier split)
2- avant l'envoi des �mails ,il faut s'assurer qu'une fonctionnalit� sur votre compte gmail est activ�e
sinon il faut l'activer (cliquer sur ce lien pour v�rifier:https://myaccount.google.com/lesssecureapps)
3- pour envoyer les fichiers sur whatsapps nil faut supprimer le fichiers cache __pycache__
dans le dossier GPAIX .
4-d�s que la proc�dure de d�coupage et d'envoi est finie ,il faut d�placer les fichiers des bulletins de paix g�n�r�s vers un autre endroit et vider le dossier 
split.

