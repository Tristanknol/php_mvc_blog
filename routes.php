<?php
function call($controller, $action) {
    require_once("controllers/". $controller . "_controller.php");

    switch ($controller){
        case "pages":
            $controller = new PagesController();
            break;
        case "posts":
            require_once("models/post.php");
            $controller = new PostsController();
            break;
            case "user":
            require_once("models/user.php");
            $controller = new UserController();
            break;
    }

    $controller-> { $action }();
}

$controllers = array("pages" => ["home", "error"], "posts" => ["index", "create", "show", "edit_delete", "createPost"], "user" => ["login", "loggedIn" ,"signIn", "signOut", "loggedOut","showSignUp", "signUp", "showProfile", "editUser", "showLogin"]);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {

        call($controller, $action);
    } else {
        call("pages", "error");
    }
} else{
    call("pages", "error");
}
?>

