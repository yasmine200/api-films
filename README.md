# 🎬 API Films – PHP

API REST simple développée en PHP permettant de récupérer des films depuis l’API TMDB et de gérer une liste de favoris.

---

## Installation

### Prérequis

- PHP ≥ 8.0
- Une clé API TMDB

### Configuration

Créer le fichier `config/config.php` :

```php
<?php
define('TMDB_API_KEY', 'VOTRE_CLE_API');
define('TMDB_BASE_URL', 'https://api.themoviedb.org/3');

Lancer le serveur

Depuis le dossier du projet :

php -S localhost:8000

⸻

Routes disponibles

GET /movies

Récupère les films depuis TMDB.

Exemple :
http://localhost:8000/movies?type=popular

⸻

GET /favorites

Retourne la liste des favoris.

Exemple :
http://localhost:8000/favorites

⸻

POST /favorites

Ajoute un film aux favoris.

URL :
http://localhost:8000/favorites

Body JSON exemple :

{
“id”: 123,
“title”: “Film test”
}

⸻

Tests via Postman
	1.	Ouvrir Postman
	2.	Créer une requête GET vers :
http://localhost:8000/movies?type=popular
	3.	Créer une requête POST vers :
http://localhost:8000/favorites
Body → raw → JSON

L’API renvoie toujours des réponses au format JSON avec les codes HTTP appropriés.

---
