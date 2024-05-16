<?php


namespace App\models;

use App\middleware\JsonValidator;
use Exception;

class JsonModel {
    public function readJson($source) {
        if (filter_var($source, FILTER_VALIDATE_URL)) {
            $json = file_get_contents($source);
        } else {
            $json = file_get_contents($source);
        }

        if ($json === false) {
            throw new Exception('Unable to read JSON data from the source');
        }

        if (!JsonValidator::validate($json)) {
            throw new Exception('Invalid JSON format');
        }

        $data = json_decode($json, true);
        if (!is_array($data) || empty($data)) {
            throw new Exception('Decoded JSON is not a valid array or is empty');
        }

        return $data;
    }
}