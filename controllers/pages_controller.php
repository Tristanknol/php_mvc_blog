<?php
class PagesController {
    public function home() {
        $first_name = "Christian";
        $last_name = "Sieljes";
        require_once ("views/pages/home.php");
    }
    public function error() {
        require_once ("views/pages/error.php");
    }
}