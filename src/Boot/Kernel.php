<?php

namespace  Src\Boot;

use Src\Core\Providers\RequestServiceProvider;
use Src\Core\Providers\RouteServiceProvider;
use Src\Core\Providers\ValidationRuleServiceProvider;
use Src\Core\Providers\SessionServiceProvider;

class Kernel {

    private static array $providers = [
        SessionServiceProvider::class,
        RouteServiceProvider::class,
        RequestServiceProvider::class,
        ValidationRuleServiceProvider::class
    ];

    private static array $bindings = [];


    public static function boot(){

        foreach(self::$providers as $provider){
            
            $providerObject = new $provider();
            $providerObject->boot();
            self::mergeBindings($providerObject->getBindings());
        }
    
    }


    public static function mergeBindings(array $bindings) {
        self::$bindings = array_merge($bindings, self::$bindings);
    }

    public static function resolve(string $binding){
        return self::$bindings[$binding] ?? null;
    }

    public static function make(string $binding){
        $foundBinfing = self::resolve($binding);
        return new $foundBinfing;
    }


}