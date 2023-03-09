<?php

namespace Src\Core\Http\Validation\Rules;

class Email extends Rule {

    public function handle($attribute, $value, $parameters)
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)){
            return true;
        }

        $this->setMessage($attribute, $value, $parameters);

        return false;
    }


    public function setMessage($attribute, $value, $parameters)
    {
        $this->message = "{$attribute} is not a valid email.";
    }

}