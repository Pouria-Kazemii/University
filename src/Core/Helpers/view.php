<?php

use Src\Core\Views\View;

function view(string $address, $data = []){
    return (new View())->make($address, $data);
}