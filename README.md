# 🎬 API Films – PHP

API REST simple développée en PHP permettant de :

- récupérer des films depuis l’API TMDB
- exposer des routes REST (GET, POST)
- gérer une liste de favoris stockée en JSON

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


⸻

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

Retourne la liste des films favoris stockés dans favorites.json.

http://localhost:8000/favorites

⸻

POST /favorites

Ajoute un film aux favoris.

Body JSON exemple :

{
“id”: 123,
“title”: “Film test”
}

⸻

Structure du projet

api-films/
	•	index.php
	•	config/
	•	controllers/
	•	services/
	•	favorites.json
	•	front.html

⸻

Front

Un fichier front.html permet d’afficher les films populaires et d’ajouter des favoris via l’API.

---

