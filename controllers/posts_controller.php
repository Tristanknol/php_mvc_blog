<?php

class PostsController
{
    public function index()
    {
        $posts = Post::all();
        require_once("views/posts/index.php");
    }
    public function crud()
    {
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];

            $post = Post::find($id);

            require_once("views/posts/CRUD.php");
        } else {
            call("pages", "error");
        }
    }


    public function show()
    {
        if (!isset($_GET["ID"])) {
            return call("pages", "error");
        }
        $post = Post::find($_GET["ID"]);
        require_once ("views/posts/show.php");
    }
}
