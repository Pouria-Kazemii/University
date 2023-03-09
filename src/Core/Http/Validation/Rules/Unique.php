<?php

namespace Src\Core\Http\Validation\Rules;

use Src\Core\QueryBuilder\QueryBuilder;

class Unique extends Rule {

    public function handle($attribute, $value, $parameters)
    {
        $table = $parameters[0];
        $column = $parameters[1];

        $valueExists = QueryBuilder::getInstance()->table($table)
            ->where($column, $value)
            ->exists();

        if(!$valueExists){
            return true;
        }

        $this->setMessage($attribute, $value, $parameters);

        return false;
    }

    public function setMessage($attribute, $value, $parameters){
        $table = $parameters[0];
        $column = $parameters[1];
        $this->message = "{$value} already exists on {$table} . {$column}";
    }

}