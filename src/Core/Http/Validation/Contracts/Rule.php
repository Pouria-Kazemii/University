<?php

namespace Src\Core\Http\Validation\Contracts;

interface Rule {

    public function handle($attribute, $value, $parameters);

    public function message();

    public function setMessage($attribute, $value, $parameters);

}