<?php 

namespace Src\Core\Providers;

use Src\Core\Providers\Contracts\ProviderInterface;

class RouteServiceProvider extends Provider {

    protected array $binds = [];


    public function boot() {
        $this->registerRoutes();
    }


    public function registerRoutes(){
        require_once __DIR__ . '../../../routes/web.php';
    }

}