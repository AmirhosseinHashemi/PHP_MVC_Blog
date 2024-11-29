<?php

namespace app;

use PDO;

class Database
{
    public ?PDO $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=cms', 'cms_admin', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function getData()
    {
        $query = $this->pdo->prepare('SELECT * FROM :article');
        $query->bindValue(":article", 'article');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
