<?php

namespace App\controllers;

use App\models\JsonModel;
use Exception;

class CsvController {
    public function convert() {
        try {
            $jsonSourceUrl = $_POST['sourceUrl'] ?? null;
            $jsonSourceFile = $_FILES['sourceFile'] ?? null;
            $fields = isset($_POST['fields']) ? explode(',', $_POST['fields']) : [];
            $delimiter = isset($_POST['delimiter']) ? $_POST['delimiter'] : ',';
            $enclosure = isset($_POST['enclosure']) ? $_POST['enclosure'] : '"';

            $model = new JsonModel();

            if ($jsonSourceUrl) {
                $data = $model->readJson($jsonSourceUrl);
            } elseif ($jsonSourceFile) {
                $fileContent = file_get_contents($jsonSourceFile['tmp_name']);
                $data = json_decode($fileContent, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception('Invalid JSON format in uploaded file');
                }
            } else {
                throw new Exception('No JSON source provided');
            }

            if (empty($data)) {
                throw new Exception('No data found in JSON source');
            }

            // Vérifier si $data est une liste ou un objet unique
            if (isset($data[0])) {
                $dataArray = $data;
            } else {
                $dataArray = [$data]; // Envelopper l'objet dans un tableau
            }

            $output = fopen('php://memory', 'r+');
            $firstRow = $fields ? array_intersect_key($dataArray[0], array_flip($fields)) : $dataArray[0];

            if (empty($firstRow)) {
                throw new Exception('No valid fields found in JSON data');
            }

            fputcsv($output, array_keys($firstRow), $delimiter, $enclosure);

            foreach ($dataArray as $row) {
                if ($fields) {
                    $row = array_intersect_key($row, array_flip($fields));
                }
                fputcsv($output, $row, $delimiter, $enclosure);
            }

            rewind($output);
            $csv = stream_get_contents($output);
            fclose($output);

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename="output.csv"');
            echo $csv;
        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}