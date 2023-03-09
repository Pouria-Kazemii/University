<?php

namespace Src\Core\Providers;

use Src\Core\Http\Request;
use Src\Core\Providers\Contracts\ProviderInterface;

class RequestServiceProvider extends Provider {

    protected array $binds = [];


    public function boot() {
        $this->registerRequest();
    }

    public function registerRequest(){
        Request::register();
    }

}