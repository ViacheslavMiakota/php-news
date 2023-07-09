<?php
  
namespace controllers\connect;



class Database {
    private $link;
    private $db;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require 'config.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        try {
            $this->link = new \PDO($dsn, $config['username'], $config['password']);
            $this->link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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

?>
