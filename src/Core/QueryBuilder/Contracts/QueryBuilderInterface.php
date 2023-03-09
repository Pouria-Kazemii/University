<?php 

namespace Src\Core\QueryBuilder\Contracts;

interface QueryBuilderInterface {


    public static function getInstance();

    public function table(string $table);

    public function select(array $columns = []);

    public function insert(array $values);

    public function get();

}