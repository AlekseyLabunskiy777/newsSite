<?php

namespace utils;

use Exception;
use models\News;

class ViewUtils
{
    private News $newsModel;
    public function __construct()
    {
        $this->newsModel = new News();
    }
    /**
     * Відображає шаблон із переданими даними
     * @param string $viewPath Шлях до файлу вигляду (наприклад, 'news/index')
     * @param array $data Асоціативний масив із даними для шаблону
     * @return string Вміст відрендереного шаблону
     * @throws Exception Якщо шаблон не знайдено
     */
    public function render($viewPath, $data = [], $layout = 'layouts/main') {
        // Формуємо шлях до файлу вьюшки
        $viewFile = 'views/' . str_replace('/', DIRECTORY_SEPARATOR, $viewPath) . '.php';

        if (!file_exists($viewFile)) {
            throw new Exception("Шаблон '$viewPath' не знайдено за шляхом: $viewFile");
        }

        // Витягуємо дані
        extract($data, EXTR_SKIP);

        // Рендеримо вміст
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // Формуємо шлях до головного шаблону
        $layoutFile = 'views/' . str_replace('/', DIRECTORY_SEPARATOR, $layout) . '.php';

        if (!file_exists($layoutFile)) {
            throw new Exception("Головний шаблон '$layout' не знайдено за шляхом: $layoutFile");
        }

        // Рендеримо головний шаблон із вмістом
        ob_start();
        require $layoutFile;
        return ob_get_clean();
    }


    /**
     * Пагінація
     * @param $page
     * @return array[]
     */
    public  function pagination($page): array
    {
        $total_news = $this->newsModel->getTotalNewsCount();
        $offset = ($page - 1) * COUNT_NEWS_ON_PAGE_LIMIT;
        $total_pages = ceil($total_news / COUNT_NEWS_ON_PAGE_LIMIT);

        return ['page' => $page, 'total_pages' => $total_pages, 'offset' => $offset];
    }

}