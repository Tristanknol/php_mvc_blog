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
                    $_SESSION["email"] = $result["email"];
                    $_SESSION["loggedIn"] = TRUE;
                    header("location: ?controller=user&action=loggedIn");
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

    public static function signUp() {
        $db = db::getInstance();
        try {
            $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $db->prepare($query);

            // Sanitize and validate input data
            $name = filter_input(INPUT_POST, 'RegisterName', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'RegisterEmail', FILTER_VALIDATE_EMAIL);
            $password = $_POST['RegisterPassword'];

            // Check if input data is valid
            if (!$name || !$email || !$password) {
                echo "Invalid input data";
                return;
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);

            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->rowCount() > 0) {
                session_regenerate_id();
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                $_SESSION["loggedIn"] = true;
                header("location: ?controller=user&action=loggedIn");
            } else {
                echo "Account not created";
            }
        } catch (Exception $e) {
            die("Database connection error occurred.");
        }
    }

    public static function createUser() {
            require_once "connection.php";
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
                header("refresh: 0");
            }
    }


    public static function editUser() {
        $db = db::getInstance();
        try {
            $query = "UPDATE users SET name = :name, email = :email, password = :password";
            $stmt = $db->prepare($query);

            // Sanitize and validate input data
            $name = filter_var($_POST['RegisterName'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['RegisterEmail'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['RegisterPassword'];

            // Check if input data is valid
            if (!$name || !$email) {
                echo "Invalid input data";
                return;
            }

            // Hash the password
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(":password", $hashedPassword);
            }

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);

            $stmt->execute();

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                header("location: ?controller=user&action=loggedIn");
            } else {
                echo "Failed to update account";
            }
        } catch (Exception $e) {
            die("Database connection error occurred.");
        }
    }
}

?>