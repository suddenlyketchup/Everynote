<?php 
include 'includes/auth-header.php';
require 'includes/db.php';
$message = '';
if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = sha1($password);

    $checkLogin = mysqli_query($db, "SELECT * FROM users where email='$email' and password='$password'");
    $count = mysqli_num_rows($checkLogin);

    if($count == 1) {
      $user = mysqli_fetch_assoc($checkLogin);
      $_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7'] = $user['id'];

      if($_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7']){
        header("location:home.php");
      }else{
        echo "Session not set please contact the developer";
        exit();
      }
    }else{
      $message = "Your email or password is incorrect please try again";
    }

}
?>
<div class="wrapper">
    
    <!-- message -->
    <?php
      if(!empty($message)) {
    ?>
      <h2><?=  $message?></h2>    
    <?php
      }
    ?>

    <h1>Hello User!</h1>
    <p>Welcome to <em>EveryNote<em></p>
    <form action="login.php" method="POST">
      <input type="email" placeholder="Enter email" name="email">
      <input type="password" placeholder="Password" name="password">
      <button type="submit" name="login">Login</button>
    </form>
    <div class="not-member">
      Not a member? <a href="register.php">Register Now</a>
    </div>
  </div>
</body>
</html>
