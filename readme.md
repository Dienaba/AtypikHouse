## Notre projet a était essentiellement codé sur Filezilla

### Voici la documentation pour faire fonctionner le site internet :

1. Disposer de XAMPP ou MAMP afin d'utiliser phpMyAdmin et le lancer
2.  Connectez-vous sur phpMyAdmin via cette url: http://localhost/phpmyadmin/index.php
3. Creer une base de donnée et appelez là atypikhouse.local
4. Ensuite récupérer le projet sur github en faisant dans la console ou terminal un git clone https://github.com/Dienaba/AtypikHouse.git dans le dossier htdocs du dossier xampp/mamp
5. Une fois le projet importé, ajouter le fichier .env vos identifiants de connexion phpMyAdmin (DB_USERNAME et DB_PASSWORD)

Vous pouvez dès à présent lancer le site

### Lancer le site internet :

1. composer install / composer update
2. php artisan serve
3. Aller sur le lien : http://127.0.0.1:8000/ de votre navigateur  
(Si problème) Si l'erreur **symlink(): No such file or directory** apparait sur votre page veuillez suivre les indication suivante :
    Ouvrir un terminal à la racine du projet et tapez les commandes suivante :  
    - cd public  
    - rm -r storage  
    - cd ..  
    - php artisan storage:link  
Relancer le serve : php artisan serve

