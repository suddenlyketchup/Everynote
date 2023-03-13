<?php
if(isset($_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7'])) {
    header("Location: home.php");
}else{
    header("Location: login.php");
}
?>