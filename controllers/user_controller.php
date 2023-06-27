<?php

//folder: controllers/users_controller.php


//Create the class userController
//functions for view (login, error)
//check for form $_POST submit to verify the user tp login
//show the result or the error


//requere the model for the user
require_once ("models/user.php");

 class UserController {
//      function to show the login page
        public function showLogin() {
            require_once ("views/pages/login.php");
        }

    public function signIn() {
//        check the data for both post requests
        $email = $_POST["email"];
        $password = $_POST["password"];
//        validate the values for both POST request, if both fields from the form are filled; try login in by calling the user model with the $email
        if (!empty($email)) {
            if (!empty($password)) {
                $user = user::login($email, $password);
            } else {
                echo "password is required";
            }
        } else {
            echo "email is required";
    }
        $user = user::login($email, $password);
    }


// Function to sign out; destroy the session and navagate to the home page;
        public function signOut() {
            session_destroy();
            header("location: localhost:8888/php_mvc_blog");
        }


        public function showSignUp() {
            require_once ("views/pages/sign-up.php");
        }

        public function signUp() {
       $name = $_POST["RegisterName"];
       $email = $_POST["RegisterEmail"];
       $password = $_POST["RegisterPassword"];

       if (!empty($name)) {
           if (!empty($email)) {
               if (!empty($password)) {
                   $user = user::signUp($name, $email, $password);
                   $result = $user->saveUser();
               } else {
                   echo "password is required";
            }
        } else {
            echo "email is required";
               }
           }  else {
           echo "name is required";
       }
        }

        public function saveUser() {
            $user = user::saveUser();
        }


        public function profile() {
            require_once ("views/users/profile.php");
        }

        public function profileSubmit() {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            if ($password == $password2) {
                $user = user::profile($name, $email, $password);
            } else {
                echo "passwords do not match";
            }
        }

        public function delete() {
            $user = user::delete();
        }

        public function deleteSubmit() {
            $user = user::deleteSubmit();
        }

        public function index() {
            $users = user::all();
            require_once ("views/users/index.php");
        }

        public function show() {
            if (!isset($_GET["ID"])) {
                return call("pages", "error");
            }
            $user = user::find($_GET["ID"]);
            require_once ("views/users/show.php");
        }

        public function create() {
            require_once ("views/users/create.php");
        }

        public function createSubmit() {
            $name = $_POST["name"];
            $email = $_POST;
 }

 }