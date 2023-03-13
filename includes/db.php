<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "Everynotefinal";

$db = mysqli_connect($server, $username, $password, $db);

if(!$db) {
    echo "Database connection failed try again";
    exit();
}
?>