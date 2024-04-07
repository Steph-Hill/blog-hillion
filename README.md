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
1.	Clonage du dépôt à l’aide du terminal de votre choix (PowerShell, Invite de Commande, etc...) :
- git clone https://github.com/Steph-Hill/blog-hillion.git 
3.	Ouvrir le projet dans votre éditeur de code préféré. 
4.	Installer les dépendances de Node :
- npm install ou yarn install 
5.	Installer les dépendances PHP et la librairie InertiaJS : 
- composer install && composer require inertiajs/inertia-laravel 
5.	Dupliquer env.example et renommez-le en « .env ».
6.	Générer une nouvelle clé pour l’application :
- php artisan key:generate 
7.	Génération les migrations de la base de données :
- php artisan migrate
8.  Créer le lien storage :
- php artisan storage:link 
9.	Générer de fausses données pour remplir la base de données : 
php artisan db:seed 
10.	Démarrage de l’application :
- Serveur Vite.js :
- yarn run dev ou npm run dev
- Serveur php pour laravel :
- php artisan serve
11.	Dans un environnement Apple si erreur type : "dyld[31071]: Library not loaded: @loader_path/../../../../opt/icu4c/lib/libicui18n.73.dylib", appliquer ce correctif : brew reinstall icu4c




