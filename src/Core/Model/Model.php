<?php

namespace Src\Core\Model;

use Exception;
use PDO;
use Src\Core\Model\Contracts\ModelInterface;
use Src\Core\QueryBuilder\QueryBuilder;

abstract class Model implements ModelInterface {

    protected string $table;

    protected QueryBuilder $query;

    protected array $fillable = [];

    protected array $values = [];

    public function __construct()
    {
        $this->query = QueryBuilder::getInstance();
    }

    public static function getInstance()
    {
        return new static(); 
    }

    public function table()
    {
        return $this->table;
    }

    public function create(array $values)
    {
        $this->setValues($values);
        $this->checkFillables($values);

        $this->query->table($this->table)
            ->insert(
                $this->only($this->fillable)
            );
    }

    public function checkFillables(array $values){
        $keys = array_keys($values);
        
        $fillable = $this->fillable;

        $unwantedFields = array_filter($keys, function($key) use ($fillable){
            return !in_array($key, $fillable);
        });

        if(count($unwantedFields)){

            throw new Exception("mass assignement exception. unwanted fields : " . implode(', ', $unwantedFields));

        }
    }


    public function all()
    {
        return $this->query->table($this->table)->get();
    }

    public function setValues(array $values){
        $this->values = $values;
    }

    public function only(array $keys){
        return array_filter(
            $this->values,
             
            function($key) use ($keys){
                return in_array($key, $keys);
            },

            ARRAY_FILTER_USE_KEY
        );
    }

    // Collection 

} 