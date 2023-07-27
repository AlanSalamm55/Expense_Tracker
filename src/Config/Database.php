<?php

namespace App\Config;

class Database
{
    public \PDO $pdo;

    public $user = '';
    private $host = "localhost";
    private $dbname = "_database";
    public $password = '';

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $user = 'root';
        $password = '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }
}
