<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prérequis 

Laravel 11 demande de posséder la version de PHP supérieur ou égal à 8.2, assurez-vous d’avoir une version de PHP suffisante pour procéder à l’installation de l’application.
- Php > 8.2
- Composer 2.7.2
- MySQL 8.0.23
- Node 20.10.0

## Installation

1. Clonage du dépôt :
Ouvrez le terminal de votre choix (PowerShell, Invite de Commande, etc.).
Clonez le dépôt en utilisant la commande suivante :
- git clone https://github.com/Steph-Hill/blog-hillion.git
2.	Placer vous dans le dossier:
Effectuer la commande permettant d’acceder au dossier de l’application :
- cd nomduprojet
3. Ouverture du projet 
Appliquer la commande suivante pour ouvrir le projet avec votre éditeur de code :
- code .
4. Installer les dependences de node
Ouvrez le terminal dans votre editeur de code, appliquer la commande suivante pour installer toutes les dependences avec soit npm ou yarn :
- npm install
ou 
- yarn install
5. Installer les dépendances PHP et d'inertia la commande suivante :
- composer install && composer require inertiajs/inertia-laravel
6. Ajout du fichier « .env » :
Dupliquer env.example et renommez-le en « .env ».
7. Générer une nouvelle clé pour l’application
- php artisan key:generate
8. Run migration générer une nouvelle clé pour l'application :
- php artisan migrate
9.	Démarrer l’application en exécutant les commandes suivantes à l’aide de deux terminals dans votre editeur de code :
Pour le lancement du serveur vite
- npm run dev
Pour le lancement du server php
- php artisan serve
Maintenant se diriger sur le lien proposer pour acceder à l’application web en local :
- http://127.0.0.1:8000/
10.	Dans un environement Apple si erreur type :
"dyld[31071]: Library not loaded: @loader_path/../../../../opt/icu4c/lib/libicui18n.73.dylib"
Appliquer ce correctif :
- brew reinstall icu4c
11. Génération des articles via la commande seed :
- php artisan db:seed




