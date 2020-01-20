# Symfony

Création d'une API avec API plateforme 

## Etape pour configurer le projet

- composer install 
    - Pour installer les différents packages nécessaire au fonctionnement de l'application

- Configuer et lancer la base de donnés
    - Dans le fichier .env DATABASE_URL=mysql://root:@127.0.0.1/testapi
    - Lancer wampserver ou tous autre application qui permet de gérer une base de donnée

- php bin/console doctrine:database:create
    - Créer la base de données 

- php bin/console doctrine:schema:create
    - Créer le schema de la base de données 

- php bin/console doctrine:fixtures:load
    - Génere des données qui vont etre persister dans la base de donées 

- php bin/console server:run (ou symfony serve si le cli symfony est installer)
    - Pour démarrer le serveur 