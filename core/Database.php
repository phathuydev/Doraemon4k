<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance;
    private $host = "localhost";
    private $username = "root";
    private $password = "mysql";
    private $dbname = "ilaetgduhosting_doraemon4k";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối không thành công!" . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
