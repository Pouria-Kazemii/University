<?php

namespace Src\Core\Database;

use PDO;
use Src\Core\Database\Contracts\ConnectionInterface;

class Connection implements ConnectionInterface {
    
    private $config;

    private static $instance; 

    private $driver;

    private $host;

    private $dbName;

    private $userName;

    private $password;

    private PDO $pdo;

    private function __construct()
    {
        $this->setAttributes();
        $this->connect();
    }

    private function connect(){

        $dns = "$this->driver:host=$this->host;dbname=$this->dbName";

        $this->pdo = new PDO(
            $dns,
            $this->userName,
            $this->password
        );
    }


    private function setAttributes(){
        $this->setConfig();
        $this->setDriver();
        $this->setHost();
        $this->setDbName();
        $this->setUser();
        $this->setPassword();
    }


    private function setConfig() {
        $this->config = include __DIR__ . '/../../config/database.php';
    }

    private function setDriver() {
        $this->driver = $this->config['driver'];
    }

    private function setHost() {
        $this->host = $this->config['host'];
    }

    private function setDbName() {
        $this->dbName = $this->config['dbname'];
    }

    private function setUser() {
        $this->userName = $this->config['username'];
    }

    private function setPassword() {
        $this->password = $this->config['password'];
    }


    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }


    private function __clone(){}

}