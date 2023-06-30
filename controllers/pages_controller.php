<?php
class PagesController {
//    show the home page
    public function home() {
        require_once ("views/pages/home.php");
    }
//    show the error page
    public function error() {
        require_once ("views/pages/error.php");
    }
}