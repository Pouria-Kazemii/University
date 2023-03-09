<?php

namespace Src\Core\Http\Validation;

use Src\Boot\Kernel;
use Src\Core\Http\Request;
use Src\Core\Http\Validation\Contracts\FormRequest;
use Src\Core\Http\Validation\Contracts\Validate;

class Validator implements Validate{

    public static function make(FormRequest $formRequest)
    {
        foreach($formRequest->rules() as $attribute => $rules){

            foreach($rules as $rule){
                $ruleObject = Kernel::make(self::extractRuleName($rule));

                $isValid = $ruleObject->handle(
                    $attribute, 
                    Request::get($attribute), 
                    self::extractRuleParames($rule)
                );
                
                self::setError($isValid, $ruleObject->message());

            }

        }
       
        return self::checkForErrors();
    }


    public static function extractRuleName(string $rule){
        $ruleArray = explode(':', $rule);

        return $ruleArray[0];
    }

    public static function extractRuleParames(string $rule){
        $ruleArray = explode(':', $rule);

        if(empty($ruleArray[1])){
            return [];
        }

        return explode(',', $ruleArray[1]);
    }

    public static function checkForErrors(){
        if(session()->has('errors')){
            return redirect()->back();
        }

        return true;
    }

    public static function setError(bool $isValid, string $message){
        if(!$isValid){
            session()->push('errors', $message);
        }
    }

}