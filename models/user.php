<?php
class user {
    public $email;
    public $id;
    public $password;

    function __construct($email, $id, $password) {
     $this->email = $email;
     $this->id = $id;
     $this->password = $password;
    }

    public static function login($email, $password) {
//        Get the database connection
        $db = db::getInstance();
//        try to fetch the user account based on the emailadress
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $result = $stmt->fetch();
//            check for the results; does the account exist?
            if ($result){
                if (password_verify($password, $result["password"])) {
//                    session
                    session_regenerate_id();
                    $_SESSION["name"] = $result["name"];
                    $_SESSION["loggedIn"] = TRUE;
                    header("location: ?controller=pages&action=loggedIn");
                } else {
                    echo "incorrect password";
                }
            } else {
               echo "account not found";
            }
        }
        catch (Exception $e) {
            die("Database connection error occurred.");
        }
    }
}

?>