<?php

namespace Src\Core\Router\Contracts;


interface RouterInterface {

    public static function get(string $route, array $action);

    // public static function post(string $route, array $action);

    public static function find(string $route, string $method);


}