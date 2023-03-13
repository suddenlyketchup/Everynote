<?php
require('includes/check-auth.php');
require('includes/db.php');
checkForLoggedInUser();
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($db, $_GET['id']);
    $sql = "DELETE FROM notes WHERE id='$id';";
    $delete = mysqli_query($db, $sql);

    if($delete) {
        header("location: home.php?delete=success");
    }else{
        echo "Delete failed please contact the developer";
        exit();
    }
}else{
    header("location: home.php");
}
?>