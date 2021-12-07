<?php

namespace app\traits;

trait TSingletone
{
    private static $instance = null; //Db

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function __construct() {}
    public function __clone() {}
    public function __wakeup() {}

}