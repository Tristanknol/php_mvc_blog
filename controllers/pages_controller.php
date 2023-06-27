<?php
class PagesController {
    public function home() {
        $first_name = "Tristan";
        $last_name = "Knol";
        require_once ("views/pages/home.php");
    }
    public function error() {
        require_once ("views/pages/error.php");
    }

    public function login() {
        require_once ("views/pages/login.php");
    }

    public function loggedIn() {
        require_once ("views/pages/logged-in.php");
    }
}