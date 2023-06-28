<?php
class post {
    public $ID;
    public $Author;
    public $Title;
    public $Content;
    public $Slug;
    public $Date;

//    construct all the variables
    public function __construct($ID, $Author, $Title, $Content, $Slug, $Date){
        $this->ID = $ID;
        $this->Author = $Author;
        $this->Title = $Title;
        $this->Content = $Content;
        $this->Slug = $Slug;
        $this->Date = $Date;
    }

//    get all posts
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM posts");

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post["ID"], $post["Author"], $post["Title"], $post["Content"], $post["Slug"], $post["Date"]);
        }
    return $list;
    }

//    find a post by ID
    public static function find($ID) {
        $db = Db::getInstance();
        $ID = intval($ID);
        $req = $db->prepare("SELECT * FROM posts WHERE ID = :ID");
        $req->execute(["ID" => $ID]);
        $post = $req->fetch();
        return new Post($post["ID"], $post["Author"], $post["Title"], $post["Content"], $post["Slug"], $post["Date"]);
    }

    public static function findPost() {
        $pdo = Db::getInstance();
        $post = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $post->bindParam(':id', $getid);
        $post->execute();
        $postRow = $post->fetch();
    }

    public static function deletePost(){
        $pdo = Db::getInstance();
            $deletepost = $pdo->prepare("DELETE FROM posts WHERE id = :id");
            $id = isset($_POST['ID']) ? $_POST['ID'] : '';
             if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
                 }
            $deletepost->bindParam(':id', $id);
            $deletepost->execute();
            echo "<div class='fixed top-0 bg-white text-center w-full h-full flex flex-col items-center justify-center'>
            <h1 class='text-purple-900 font-bold text-6xl'>Post is deleted</h1>
            <a class='text-2xl underline text-red-500' href='?controller=posts&action=index'>Go back</a>
            </div>";
        }

    public static function createPost() {
        $pdo = Db::getInstance();
        $createpost = $pdo->prepare("INSERT INTO posts (author, title, content, slug, date) VALUES (:author, :title, :content, :slug, :date)");
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createSubmit"])) {
            $author = isset($_POST['Author']) ? $_POST['Author'] : '';
            $title = isset($_POST['Title']) ? $_POST['Title'] : '';
            $content = isset($_POST['Content']) ? $_POST['Content'] : '';
            $slug = isset($_POST['Slug']) ? $_POST['Slug'] : '';
            $date = isset($_POST['Date']) ? $_POST['Date'] : '';
            //           bindParam() binds the named parameter marker to the specified parameter
            $createpost->bindParam(':author', $author);
            $createpost->bindParam(':title', $title);
            $createpost->bindParam(':content', $content);
            $createpost->bindParam(':slug', $slug);
            $createpost->bindParam(':date', $date);
            $createpost->execute();
            header("Location: ?controller=posts&action=show&ID=" . $pdo->lastInsertId());
        }
    }

    public static function editPost() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pdo = Db::getInstance();
            $updatepost = $pdo->prepare("UPDATE posts SET author = :author, title = :title, content = :content, slug = :slug, date = :date WHERE id = :id");
//         check if ID is set, if not, get ID from URL
            $id = isset($_POST['ID']) ? $_POST['ID'] : '';
            $author = isset($_POST['Author']) ? $_POST['Author'] : '';
            $title = isset($_POST['Title']) ? $_POST['Title'] : '';
            $content = isset($_POST['Content']) ? $_POST['Content'] : '';
            $slug = isset($_POST['Slug']) ? $_POST['Slug'] : '';
            $date = isset($_POST['Date']) ? $_POST['Date'] : '';
//           bindParam() binds the named parameter marker to the specified parameter
            $updatepost->bindParam(':id', $id);
            $updatepost->bindParam(':author', $author);
            $updatepost->bindParam(':title', $title);
            $updatepost->bindParam(':content', $content);
            $updatepost->bindParam(':slug', $slug);
            $updatepost->bindParam(':date', $date);
            $updatepost->execute();
//            after editing, redirect to show view so user can see updated post
            header("location: ?controller=posts&action=show&ID=" . $id);
        }
        }
}