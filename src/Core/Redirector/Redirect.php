<?php

namespace Src\Core\Redirector;

class Redirect {

    public function to(string $uri){
        return header("Location:{$uri}");
    }


    public function back(){
        $redirectUrl = str_replace($_SERVER['HTTP_ORIGIN'], '', $_SERVER['HTTP_REFERER']);
            
        return $this->to($redirectUrl);
    }

}