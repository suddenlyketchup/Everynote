<?php
include 'includes/header.php';
?>
<main class="main">
    <?php include 'templates/general/sidebar.php'; ?>
    <div class="content">

        <div class="container">

            <?php  include 'templates/general/navbar.php' ?>
            
  <?php
  
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE user_id=$_SESSION['$id']";
$query=mysqli_connect($sql,$db);
  
            <div class="notes-calendar">

                <!-- Start Events -->
                <div class="notes">
                    <img src="https://ui-avatars.com/api/?name=Yekatit 23&background=random&size=120&bold=true&color=random&format=png" alt="profile" class="profile-img">
                    <h2 class="notes-header">Full Name</h2>
                    <div class="mb-20">
                        <div class="event">
                            <h2>User Profile</h2><br/>
                            <ul>
                                <li><b>Full Name:</b>$query["full_name"]</li>
                                <li><b>Nick Name:</b>$query[nick_name]</li>
                                <li><b>Email:</b> $query["email"]</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div> ?>
            <?php
include 'includes/footer.php';
?>