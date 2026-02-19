<?php
header("Content-Type: application/json");

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/MovieController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/movies') {
    $type = $_GET['type'] ?? 'popular';
    MovieController::list($type);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Route inconnue"]);
}