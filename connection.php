<?php
class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

//    get the connection
    public static function getInstance() {
        if(!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        // Set the credentials for the database here
        self::$instance = new PDO("mysql:host=localhost;dbname=mvc", "root", "root", $pdo_options);
        }
        return self::$instance;
    }
}