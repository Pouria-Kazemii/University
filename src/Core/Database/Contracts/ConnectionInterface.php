<?php

namespace Src\Core\Database\Contracts;


interface ConnectionInterface {

    public static function getInstance();

    public function getConnection();

}