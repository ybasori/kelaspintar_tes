<?php

namespace System;

use PDO;

class Database
{

    private $pdo;

    function __construct()
    {

        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $dbname = $_ENV['DB_NAME'];
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function query($sql)
    {

        $stmt = $this->pdo->prepare($sql);

        return $stmt;
    }
}
