<?php

namespace Src\Core\Http\Validation\Rules;

class Required extends Rule {

    public function handle($attribute, $value, $parameters){
        if(strlen($value)){
            return true;
        }

        $this->setMessage($attribute, $value, $parameters);

        return false;
    }

    public function setMessage($attribute, $value, $parameters){
        $this->message = "{$attribute} can not be null";
    }

}