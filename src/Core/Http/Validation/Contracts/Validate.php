<?php 

namespace Src\Core\Http\Validation\Contracts;

interface Validate {
    
    public static function make(FormRequest $formRequest);

}