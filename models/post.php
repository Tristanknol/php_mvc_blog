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
}