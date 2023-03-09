<?php 

namespace Src\Core\Views;

class View {

    public function make(string $address, $data = []){
        $address = str_replace('.', '/', $address);
        extract($data);
        require __DIR__ . "/../../views/{$address}.php";
    }

}