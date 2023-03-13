<?php 
include 'templates/general/message.php';
include 'includes/auth-header.php';
require 'includes/db.php';
$message = '';

if(isset($_POST['submit'])) {
  $full_name = mysqli_real_escape_string($db, $_POST["full_name"]);
  $nickname = mysqli_real_escape_string($db, $_POST["nickname"]);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirmPassword = mysqli_real_escape_string($db, $_POST['confirm_password']);
  if($password == $confirmPassword) {
    $checkExist = mysqli_query($db, "SELECT * FROM users where email = '$email'");
    $num = mysqli_num_rows($checkExist);
    
    $password = sha1($password);

    if($num == 0) {
      $sql = "INSERT INTO `users` (`full_name`, `email`, `password`, `nick_name`, `created_at`) VALUES ('$full_name', '$email', '$password', '$nickname', 'NOW()');";
      $query = mysqli_query($db, $sql);
      if($query) {
        $message = "Account created successfully please login. <a href='login.php'>Login</a>";
        
      }else {
        echo "Creating Account failed please contact the developer";
        exit();
      }
  }else {
    $message = "user already exist. please login";
  }
  }else{
    $message = "Passwords doesn't match";
  }
}
?>

<div class="wrapper">
  
    <!-- message -->
    <?php
      if(!empty($message)) {
        message1("$message", "register.php");
    ?>
    <?php
      }
    ?>

    <h1>Create Account</h1>
    <p>join our EveryNote community</p>
    <form id="my_form" action="register.php" method="POST" autocomplete="off" onsubmit="return validate()">
      <input type="text" id="username" placeholder="Enter Full Name" name="full_name"  >
      <div id="errors"></div>
      <input type="text" placeholder="Enter Nickname(optional)" name="nickname" required>
      <input type="email"  id="email"placeholder="Enter email" name="email" required>
      <input type="password" id="password" placeholder="Enter password" name="password" required>
      <div id="errors1"></div>
      <input type="password" placeholder="Confirm password" name="confirm_password" required>
      <div id="errors2"></div>
      <button type="submit" name="submit">Create Account</button>
    </form>

    <div class="not-member">
      Already a member? <a href="login.php">Login</a>
    </div>
    <script>
      //validate full name
function validateName(){ 
  var numbers = /[0-9]+/g;
  var letters = /^[A-Za-z]+$/;
    if(document.querySelector("#my_form").full_name.value.match(numbers)){ 
      
      document.getElementById('errors').innerHTML="*Full name must have alphabet character only*";
      return false;
    } 
       
    else{

         return true;
        }
    
  
  }

//validate email
   function validateEmail() {let email=document.querySelector("#my_form").email.value;
    let mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let result1 = email.match(mail);
    if(!result1){  
         document.getElementById('errors1').innerHTML="*Please enter valid email*";
         return false;
    }
    return true;
  }
//validate password
function validatePassword(){
  if(document.querySelector("#my_form").password.value.length<3){  
         document.getElementById('errors2').innerHTML="*Please enter a strong pass word*";
         return false;
    }
    return true;
  }
    function validate(){
     {
if(!validateName())
return false;
if(!validateEmail())
return false;
if(!validatePassword())
return false ;
}
return true;
    } 
  </script>
  </div>

</body>
</html>
  
</body>
</html>