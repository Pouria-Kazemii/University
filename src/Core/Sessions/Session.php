<?php

namespace Src\Core\Sessions;

class Session {

    public static function start(){
        session_start();
    }

    public function store(string $key, string $value){
        $_SESSION[$key] = $value;
    }

    public static function push(string $key, string $value){
        $_SESSION[$key][] = $value;
    }

    public function get(string $key){
        return $_SESSION[$key] ?? [];
    }

    public function flush(string $key) {
        $temp = $this->get($key);

        $this->remove($key);

        return $temp;
    }


    public function remove(string $key){
        unset($_SESSION[$key]);
    }

    public function has(string $key){
        return count(self::get($key)) > 0;
    }


}