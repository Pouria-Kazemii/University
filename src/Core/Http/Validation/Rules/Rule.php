<?php

namespace Src\Core\Http\Validation\Rules;

use Src\Core\Http\Validation\Contracts\Rule as RuleInterface;

abstract class Rule implements RuleInterface{

    protected string $message = '';

    public function message() {
        return $this->message;
    }

}