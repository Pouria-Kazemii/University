<?php

namespace Src\Core\Providers;

use Src\Core\Sessions\Session;

class SessionServiceProvider extends Provider {

    protected array $binds = [];

    public function boot(){
        Session::start();
    }

}