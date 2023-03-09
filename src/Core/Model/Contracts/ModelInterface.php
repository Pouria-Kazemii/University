<?php 

namespace Src\Core\Model\Contracts;

interface ModelInterface {

    public static function getInstance();

    public function all();

    public function create(array $values);

    public function table();

}