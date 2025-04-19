<?php

use controllers\NewsController;

require_once 'controllers/NewsController.php';

$route = $_GET['route'] ?? 'index';

switch ($route) {
    case 'index':
        $controller = new NewsController();
        $controller->actionIndex();
        break;
    default:
        die("404: Сторінку не знайдено.");
}