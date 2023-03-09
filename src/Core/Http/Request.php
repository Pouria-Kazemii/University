<?php

namespace Src\Core\Http;

class Request {

    private static $request = [];

    public static function register() {
        self::$request = $_REQUEST;
    }

    public static function all() {
        return self::$request;
    }

    public static function only(array $keys){

        return array_filter(
            self::$request,
             
            function($key) use ($keys){
                return in_array($key, $keys);
            },

            ARRAY_FILTER_USE_KEY
        );

    }
    
    public static function get(string $key, string $default = ''){
        return self::$request[$key] ?? $default;
    }

}