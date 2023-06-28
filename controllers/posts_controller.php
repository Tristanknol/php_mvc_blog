<?php

class PostsController
{
//    show all posts
    public function index()
    {
        $posts = Post::all();
        require_once("views/posts/index.php");
    }

//    show the create form
    public function viewCreate()
    {
        require_once("views/posts/create.php");
    }

//    call the edit function
    public function editPost() {
        post::editPost();
    }

//    view the edit form
    public function viewEdit() {
    require_once ("views/posts/edit_delete.php");
    }

//show 1 post
    public function show()
    {
        if (!isset($_GET["ID"])) {
            return call("pages", "error");
        }
        $post = Post::find($_GET["ID"]);
        require_once ("views/posts/show.php");
    }

//    call the delete function
    public function deletePost() {
        post::deletePost();
    }

//    call the create function
    public function createPost() {
    post::createPost();
    }
}
