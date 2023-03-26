# Ski & Co

Ce projet est un site web développé en utilisant Symfony,et Tailwind 

## Installation

Pour installer le projet, suivez les étapes suivantes:

1. Clonez le dépôt GitHub en exécutant la commande suivante dans votre terminal:

git clone https://github.com/Lyn1603/Symfony_project_Ski_station.git

bash


2. Assurez-vous que vous avez installé les dépendances du projet en exécutant la commande suivante:

composer install

markdown


3. Copiez le fichier `.env` et modifiez les variables d'environnement appropriées, telles que la configuration de la base de données.

4. Exécutez les migrations pour créer les tables de base de données nécessaires:

php bin/console doctrine:migrations:migrate

markdown


5. Lancez le serveur web en exécutant la commande suivante:

symfony server:start

vbnet


6. Accédez au site web en visitant l'URL suivante dans votre navigateur:

http://localhost:8000

markdown


## Utilisation

Le site web est conçu pour permettre aux utilisateurs de  __[suivre l'actualitée du grand domaine Espace Diamant ]__. Les fonctionnalités suivantes sont actuellement disponibles:

### Utilisateur
1-__[ Rôle USER ]__ : Peut se connecter et s'inscrire pour acceder à la page d'accueil et la consulter

2- __[Rôle USER_ADMIN ]__ : Peut gérer les stations de ski ou les ajoutant ou supprimant

3- __[Rôle SUPER_ADMIN ]__: Peut gérer un domaine de station en les ajoutant ou supprimant

### fonctionnalités 

posibilitée de consultée les stations de ski et les domaines de ski

consultation la météo de la station de ski

filtrée les pistes de ski 

trouver les restaurant et magasin

voir c'est succès


## Contributeurs

Les personnes suivantes ont contribué à ce projet :

- [bastienR17](https://github.com/bastienR17)
- [tinkode92](https://github.com/tinkode92)
- [TobogganDev](https://github.com/TobogganDev)
- [Pl83](https://github.com/Pl83)
- [Lyn1603](https://github.com/Lyn1603)
