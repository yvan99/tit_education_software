<?php
namespace Server\Controllers;
use PDO;
use PDOException;
class Database
{

    // database parameters

    private $host;
    private $db_name;
    private $username;
    private $password;

    // DB CONNECTION


    public function __construct()
    {
        $this->host     = getenv("DB_HOST");
        $this->db_name  = getenv("DB_NAME");
        $this->username = getenv("DB_USER");
        $this->password = getenv("DB_PASS");
    }

    public function connect()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'DB connection Error :' . $e->getMessage();
        }

        return $this->conn;
    }
}