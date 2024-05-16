<?php

require_once __DIR__ . '/../app/controllers/CsvController.php';

$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

switch ($requestUri) {
    case '/':
        require_once __DIR__ . '/../src/views/index.php';
        break;
    case '/convert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\controllers\CsvController();
            $controller->convert();
        } else {
            http_response_code(405);
            echo 'Method Not Allowed';
        }
        break;
    default:
        http_response_code(404);
        echo 'Not Found';
        break;
}
