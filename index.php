<?php
header("Content-Type: application/json");

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/MovieController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$favoritesFile = __DIR__ . '/favorites.json';

/**
 * GET /movies
 */
if ($path === '/movies' && $method === 'GET') {
    $type = $_GET['type'] ?? 'popular';
    MovieController::list($type);
    exit;
}

/**
 * GET /favorites
 */
if ($path === '/favorites' && $method === 'GET') {

    if (!file_exists($favoritesFile)) {
        file_put_contents($favoritesFile, json_encode([]));
    }

    $favorites = json_decode(file_get_contents($favoritesFile), true);

    echo json_encode($favorites, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * POST /favorites
 */
if ($path === '/favorites' && $method === 'POST') {

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!$data) {
        http_response_code(400);
        echo json_encode(["error" => "Données invalides"]);
        exit;
    }

    if (!file_exists($favoritesFile)) {
        file_put_contents($favoritesFile, json_encode([]));
    }

    $favorites = json_decode(file_get_contents($favoritesFile), true);

    if (!is_array($favorites)) {
        $favorites = [];
    }

    $favorites[] = $data;

    file_put_contents(
        $favoritesFile,
        json_encode($favorites, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    http_response_code(201);
    echo json_encode([
        "message" => "Film ajouté aux favoris",
        "film" => $data
    ]);
    exit;
}

/**
 * Route inconnue
 */
http_response_code(404);
echo json_encode(["error" => "Route inconnue"]);