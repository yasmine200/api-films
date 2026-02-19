<?php

require_once __DIR__ . '/../services/TMDBService.php';

class MovieController {

    public static function list(string $type): void {
        try {
            $movies = TMDBService::getMovies($type);
            echo json_encode($movies);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
    }
}