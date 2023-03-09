<?php

namespace Src\Core\Router;

use Src\Core\Router\Contracts\RouterInterface;

class Router implements RouterInterface {

    protected static array $routes = [];

    public const GET = 'get';
    public const POST = 'post';

     
    public static function get(string $route, array $action){
        self::$routes[self::GET][$route] = $action;
    }


    public static function post(string $route, array $action){
        self::$routes[self::POST][$route] = $action;
    }



    public static function find(string $route, string $method){
        
        $routeMethod = strtolower($method);
        $foundRoute = self::$routes[$routeMethod][$route];

        $controller = new $foundRoute[0];
        $action = $foundRoute[1];

        $controller->$action();
    }

}