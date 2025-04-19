<?php

namespace utils;

use Exception;

class ViewUtils
{
    /**
     * Відображає шаблон із переданими даними
     * @param string $viewPath Шлях до файлу вигляду (наприклад, 'news/index')
     * @param array $data Асоціативний масив із даними для шаблону
     * @return string Вміст відрендереного шаблону
     * @throws Exception Якщо шаблон не знайдено
     */
    public function render(string $viewPath, array $data = []): string
    {
        $file = 'views/' . str_replace('/', DIRECTORY_SEPARATOR, $viewPath) . '.php';

        if (!file_exists($file)) {
            throw new Exception("Шаблон '$viewPath' не знайдено за шляхом: $file");
        }

        extract($data, EXTR_SKIP);
        ob_start();
        require $file;

        return ob_get_clean();
    }

    /**
     * Екранування рядка для безпечного виведення
     * @param string $string
     * @return string
     */
    public static function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}