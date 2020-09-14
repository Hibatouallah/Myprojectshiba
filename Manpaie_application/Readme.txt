Etape 1: 
prérequis: python 3
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
démarrer l'application dans L'invite de commande par la requete ci-dessous:
accéder à l'emplacement de l'application dans mon cas j'ai fait:
cd C:\xampp\htdocs\Gpaix
aprés taper la commande suivante: python interface.py
1- cliquer sur découper votre ficher pdf .(les bulletins de pais séparés se trouvent dans le dossier split)
2- avant l'envoi des émails ,il faut s'assurer qu'une fonctionnalité sur votre compte gmail est activée
sinon il faut l'activer (cliquer sur ce lien pour vérifier:https://myaccount.google.com/lesssecureapps)
3- pour envoyer les fichiers sur whatsapps nil faut supprimer le fichiers cache __pycache__
dans le dossier GPAIX .
4-dés que la procédure de découpage et d'envoi est finie ,il faut déplacer les fichiers des bulletins de paix générés vers un autre endroit et vider le dossier 
split.

