<?php
// call the method/function from the controller
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
// list of the controllers and their actions
$controllers = array("pages" => ["home", "error"],
    "posts" => ["index", "viewCreate", "show", "editPost", "viewEdit", "deletePost", "createPost"],
    "user" => ["login", "loggedIn" ,"signIn", "signOut", "loggedOut","showSignUp", "signUp", "showProfile", "editUser", "showLogin"]);

// check that the requested controller and action are both allowed
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

