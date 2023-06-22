<?php
class post {
    public $ID;
    public $Author;
    public $Content;

    public function __construct($ID, $Author, $Content){
        $this->ID = $ID;
        $this->Author = $Author;
        $this->Content = $Content;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM posts");

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post["ID"], $post["Author"], $post["Content"]);
        }
    return $list;
    }
    public static function find($ID) {
        $db = Db::getInstance();
        $ID = intval($ID);
        $req = $db->prepare("SELECT * FROM posts WHERE ID = :ID");
        $req->execute(["ID" => $ID]);
        $post = $req->fetch();
        return new Post($post["ID"], $post["Author"], $post["Content"]);
    }
}