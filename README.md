# API Films – PHP

Ce projet consiste à créer une petite **API REST en PHP** permettant de récupérer des films depuis l’API **The Movie Database (TMDB)** et de renvoyer les données au format JSON.

Le but est de comprendre les bases du backend en PHP, le fonctionnement des routes HTTP et l’utilisation d’une API externe.

---

## Technologies utilisées

- PHP 8
- API The Movie Database (TMDB)
- JSON
- Serveur PHP intégré
- Postman / Navigateur

---

## Structure du projet
api-films/
├── index.php
├── config/
│   ├── config.php
│   └── config.example.php
├── controllers/
│   └── MovieController.php
├── services/
│   └── TMDBService.php

---

## Installation

### Prérequis
- PHP installé sur la machine
- Une clé API TMDB
---

### Configuration
Créer un fichier `config/config.php` à partir de `config.example.php` et ajouter la clé API TMDB :

```php
<?php
define('TMDB_API_KEY', 'VOTRE_CLE_API');
define('TMDB_BASE_URL', 'https://api.themoviedb.org/3');
