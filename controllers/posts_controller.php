<?php

class PostsController
{
    public function index()
    {
        $posts = Post::all();
        require_once("views/posts/index.php");
    }
    public function edit_delete()
    {
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];

            $post = Post::find($id);

            require_once("views/posts/edit_delete.php");
        } else {
            call("pages", "error");
        }
    }

    public function create()
    {
        require_once("views/posts/create.php");
    }


    public function show()
    {
        if (!isset($_GET["ID"])) {
            return call("pages", "error");
        }
        $post = Post::find($_GET["ID"]);
        require_once ("views/posts/show.php");
    }

    public function createPost() {
    post::createPost();
    }
}
