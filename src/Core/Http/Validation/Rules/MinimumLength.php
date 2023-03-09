<?php 

namespace Src\Core\Http\Validation\Rules;

class MinimumLength extends Rule {
    
    public function handle($attribute, $value, $parameters)
    {
        $possibleLength = $parameters[0];

        if(strlen($value) < intval($possibleLength)){
            
            $this->setMessage($attribute, $value, $parameters);

            return false;
        }

        return true;
    }

    public function setMessage($attribute, $value, $parameters)
    {
        $possibleLength = $parameters[0];

        $this->message = "{$attribute} can not have less than {$possibleLength} characters";
    }

}