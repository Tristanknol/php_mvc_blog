<?php

class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if(!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO("mysql:host=localhost;dbname=knota27_php_mvc", "knota27", "d9tUG0hh1M", $pdo_options);
        }
        return self::$instance;
    }
}