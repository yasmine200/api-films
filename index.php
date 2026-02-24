<?php
header("Content-Type: application/json");

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/MovieController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/movies') {
    $type = $_GET['type'] ?? 'popular';
    MovieController::list($type);
} else {
    if ($path === '/favorites' && $_SERVER['REQUEST_METHOD'] === 'POST') {

        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        if (!$data) {
            http_response_code(400);
            echo json_encode(["error" => "Données invalides"]);
            exit;
        }
    
        $favoritesFile = __DIR__ . '/favorites.json';
    
        $favorites = json_decode(file_get_contents($favoritesFile), true);
        $favorites[] = $data;
    
        file_put_contents($favoritesFile, json_encode($favorites, JSON_PRETTY_PRINT));
    
        http_response_code(201);
        echo json_encode([
            "message" => "Film ajouté aux favoris",
            "film" => $data
        ]);
        exit;
    }
    http_response_code(404);
    echo json_encode(["error" => "Route inconnue"]);
}