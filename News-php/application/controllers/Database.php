<?php

namespace controllers\Database;

use PDO;
use Dotenv\Dotenv;

class Database
{
    private $link;
    private $db;

    public function __construct()
    {
        $this->Database();
    }

    private function Database()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();

        $dsn = 'mysql:host=' . $_ENV['HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=' . $_ENV['CHARSET'];

        try {
            $this->link = new PDO($dsn, $_ENV['USER_NAME'], $_ENV['PASSWORD']);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $this->link;
        } catch (\PDOException $e) {
            die('Помилка підключення до бази даних: ' . $e->getMessage());
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $sth = $this->link->prepare($sql);
            return $sth->execute($params);
        } catch (\PDOException $e) {
            die('Помилка виконання запиту: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        try {
            $sth = $this->link->prepare($sql);
            $sth->execute($params);
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            if ($result === false) {
                return [];
            }
            return $result;
        } catch (\PDOException $e) {
            die('Помилка виконання запиту: ' . $e->getMessage());
        }
    }

    public function prepare($sql)
    {
        return $this->link->prepare($sql);
    }

    public function quote($value)
    {
        return $this->link->quote($value);
    }
}

$db = new Database();
