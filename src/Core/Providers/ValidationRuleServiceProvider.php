<?php 

namespace Src\Core\Providers;

use Src\Core\Http\Validation\Rules\Email;
use Src\Core\Http\Validation\Rules\MaximumLength;
use Src\Core\Http\Validation\Rules\MinimumLength;
use Src\Core\Http\Validation\Rules\Required;
use Src\Core\Http\Validation\Rules\Unique;

class ValidationRuleServiceProvider extends Provider {

    protected array $binds = [
        'required' => Required::class,
        'unique' => Unique::class,
        'email' => Email::class,
        'max' => MaximumLength::class,
        'min' => MinimumLength::class,

    ]; 

    public function boot()
    {
    }

}