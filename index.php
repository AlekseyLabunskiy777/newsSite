<?php

use controllers\NewsController;

require_once 'controllers/NewsController.php';

$route = $_GET['route'] ?? 'index';
/*
 * По дефолту підключаємо метод actionIndex контроллера NewsController
 */
switch ($route) {
    case 'index':
        $controller = new NewsController();
        $controller->actionIndex();
        break;
    case 'view':
        if (isset($_GET['id'])) {
            $controller = new NewsController();
            $controller->actionView($_GET['id']);
        } else {
            die("Помилка! Параметр id не передано.");
        }
        break;
    default:
        die("404: Сторінку не знайдено.");
}