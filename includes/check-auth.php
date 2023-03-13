<?php
session_start();
//redirect the user to login page if they try to access restricted pages
function checkForLoggedInUser() {
    if(!isset($_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7'])) {
        header("Location: login.php");
    }
}

// redirect the user to home if the user is logged in used for pages such as login, signup
function checkIfUserLoggedIn() {
    if(isset($_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7'])) {
        header("Location: home.php");
    }
}
?>