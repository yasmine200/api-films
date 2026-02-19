<?php

class TMDBService {

    public static function getMovies(string $type): array {
        $url = TMDB_BASE_URL . "/movie/$type?api_key=" . TMDB_API_KEY . "&language=fr-FR";

        $response = @file_get_contents($url);

        if ($response === false) {
            throw new Exception("Erreur lors de l'appel à TMDB");
        }

        $data = json_decode($response, true);

        if (!is_array($data)) {
            throw new Exception("Réponse TMDB invalide (JSON)");
        }

        return $data;
    }
}