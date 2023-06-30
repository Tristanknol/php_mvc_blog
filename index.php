<!--index.php-->
<?php
require_once ("connection.php");
// if controller and action are set, use them
if (isset($_GET["controller"]) && isset($_GET["action"])) {
    $controller = $_GET["controller"];
    $action = $_GET["action"];
} else {
    $controller = "pages";
    $action = "home";
}

require_once "views/layout.php";
?>
