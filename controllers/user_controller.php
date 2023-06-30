<?php

//folder: controllers/users_controller.php


//Create the class userController
//functions for view (login, error)
//check for form $_POST submit to verify the user tp login
//show the result or the error


//require the model for the user
require_once ("models/user.php");

//create the class UserController
 class UserController {
//     show a succes message when the user is logged in
     public function loggedIn() {
         require_once("views/user/logged-in.php");
     }
//      function to show the login page
        public function showLogin() {
            require_once("views/user/login.php");
        }
//        function to show the logged out page
         public function loggedOut() {
            require_once("views/user/logged-out.php");
        }


//       function to sign in
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
    }


// Function to sign out; destroy the session and navagate to the home page;
        public function signOut() {
            session_destroy();
            header("location: ?controller=user&action=loggedOut");
        }

//        function to show the profile page
    public function showProfile() {
        require_once("views/user/profile.php");
    }

    //        function to show the sign up page
        public function showSignUp() {
            require_once("views/user/sign-up.php");
        }

        // function to sign up
        public function signUp() {
       $name = $_POST["RegisterName"];
       $email = $_POST["RegisterEmail"];
       $password = $_POST["RegisterPassword"];

//       validate the values for both POST request, if both fields from the form are filled try login in by calling the user model with the $email.
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

//        function to save the user
        public function saveUser() {
            $user = user::saveUser();
        }

//        function to edit the user
    public function editUser() {
        user::editUser();
    }

}