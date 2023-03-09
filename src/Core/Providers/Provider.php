<?php 

namespace Src\Core\Providers;

use Src\Core\Providers\Contracts\ProviderInterface;

abstract class Provider implements ProviderInterface {

    protected array $binds;

    public function getBindings() {
        return $this->binds;
    }

}