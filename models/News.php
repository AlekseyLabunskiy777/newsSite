<?php

namespace models;

use PDO;

require_once 'config/db.php';
class News
{
    private PDO $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
    /*всі новини*/
    public function getAll(int $limit = 5, int $offset = 0)
    {
        $stmt = $this->pdo->prepare("SELECT id, title, short_description, content, created_at FROM news ORDER BY created_at DESC LIMIT ? OFFSET ?");
        /*для pdo треба явно вказати що параметри це числа. По замовчуванню передаються як строки*/
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}