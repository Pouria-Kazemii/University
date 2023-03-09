<?php

namespace Src\Core\QueryBuilder;

use PDO;
use Src\Core\Database\Connection;
use Src\Core\QueryBuilder\Contracts\QueryBuilderInterface;

class QueryBuilder implements QueryBuilderInterface {

    private $connection;
    private string $table;
    private array $columns;
    private array $where;

    public function __construct()
    {
        $this->connection = Connection::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        return new self();
    }

    public function table(string $table){
        $this->table = $table;

        return $this;
    }

    public function select(array $columns = []){
        $this->columns = $columns;
    }

    public function insert(array $values){
        
        $columns = implode(', ', array_keys($values));
        $placeHolders = implode(', :', array_keys($values));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (:{$placeHolders})";
        $statement = $this->connection->prepare($sql);
        $statement->execute($values);

    }

    public function get(){
        $sql = "SELECT * FROM {$this->table}";

        $statement = $this->connection->prepare($sql);
        $result = $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function where($column, $value){
        $this->where[$column] = $value;

        return $this;
    }

    public function exists(){
        $whereQuery = $this->buildWherePart();
        $sql = "SELECT * FROM {$this->table} WHERE EXISTS 
            (SELECT * FROM {$this->table} WHERE $whereQuery)";
        
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_OBJ);
    }


    public function buildWherePart(){
        $wherePart = "";

        foreach($this->where as $column => $value){
            
            if(strlen($wherePart)){
                $wherePart .= " AND ";
            }

            $wherePart .= " {$column} = '{$value}' ";
        }

        return $wherePart;
    }

}