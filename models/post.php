<?php
class post {
    public $ID;
    public $Author;
    public $Title;
    public $Content;
    public $Slug;
    public $Date;


    public function __construct($ID, $Author, $Title, $Content, $Slug, $Date){
        $this->ID = $ID;
        $this->Author = $Author;
        $this->Title = $Title;
        $this->Content = $Content;
        $this->Slug = $Slug;
        $this->Date = $Date;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM posts");

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post["ID"], $post["Author"], $post["Title"], $post["Content"], $post["Slug"], $post["Date"]);
        }
    return $list;
    }
    public static function find($ID) {
        $db = Db::getInstance();
        $ID = intval($ID);
        $req = $db->prepare("SELECT * FROM posts WHERE ID = :ID");
        $req->execute(["ID" => $ID]);
        $post = $req->fetch();
        return new Post($post["ID"], $post["Author"], $post["Title"], $post["Content"], $post["Slug"], $post["Date"]);
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
            $createpost->bindParam(':author', $author);
            $createpost->bindParam(':title', $title);
            $createpost->bindParam(':content', $content);
            $createpost->bindParam(':slug', $slug);
            $createpost->bindParam(':date', $date);
            $createpost->execute();
            header("Location: ?controller=posts&action=show&ID=" . $pdo->lastInsertId());
        }
    }
}