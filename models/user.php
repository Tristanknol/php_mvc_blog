<?php
class user {
//    declare the variables
    public $email;
    public $id;
    public $password;

//    create the constructor
    function __construct($email, $id, $password) {
     $this->email = $email;
     $this->id = $id;
     $this->password = $password;
    }

//    create the login function
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
//                    session start and set the session variables
                    session_regenerate_id();
                    $_SESSION["name"] = $result["name"];
                    $_SESSION["email"] = $result["email"];
                    $_SESSION["loggedIn"] = TRUE;
                    header("location: ?controller=user&action=loggedIn");
                } else {
//                    if the password is incorrect, show the error
                    echo "<h1 class='px-20 text-center text-3xl text-purple-900'>incorrect password</h1>";
                }
            } else {
               echo "account not found";
            }
        }
        catch (Exception $e) {
            die("Database connection error occurred.");
        }
    }
//    create the signup function
    public static function signUp() {
        $db = db::getInstance();
//        try to insert the new user into the database
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
//            if the insertion failed, show the error
        } catch (Exception $e) {
            die("Database connection error occurred.");
        }
    }

//   create the logout function
    public static function editUser() {
        $db = db::getInstance();
        try {
            // Sanitize and validate input data
            $name = filter_var($_POST['RegisterName'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['RegisterEmail'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['RegisterPassword'];
            $user_email = $_SESSION["email"]; // Retrieve the current user's email from the session

            // Check if input data is valid
            if (!$name || !$email) {
                echo "<h1 class='px-20 text-3xl text-purple-900'>Invalid input data<h1>";
                return;
            }

            // Prepare the SQL statement
            $query = "UPDATE users SET name = :name, email = :email";
            if (!empty($password)) {
                $query .= ", password = :password";
            }
            $query .= " WHERE email = :user_email";

            $stmt = $db->prepare($query);

            // Bind the values to the parameters
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":user_email", $user_email);

            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(":password", $hashedPassword);
            }

            $stmt->execute();

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                header("location: ?controller=user&action=loggedIn");
            } else {
                echo "<h1 class='px-20 text-3xl text-purple-900'>submit failed please make an edit before submitting</h1>";
            }
//            catch the error if the update failed
        } catch (Exception $e) {
            echo $e->getMessage();
            die("Database connection error occurred.");
        }
    }
}
?>