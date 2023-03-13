<?php
include 'includes/header.php';
include 'templates/general/message.php';
$user_id = $_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7'];

$sql = "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY created_at DESC";
$query = mysqli_query($db, $sql);
$count = mysqli_num_rows($query);
?>
<main class="main">
  <?php include 'templates/general/sidebar.php'; ?>
  <div class="content">

    <div class="container">

      <?php  include 'templates/general/navbar.php' ?>


      <!-- Start Events + Calendar -->
      <div class="notes-calendar">

        <!-- Start Events -->
        <div class="notes">
          <h2 class="notes-header">My Notes</h2>
          <?php
           if(isset($_GET['delete'])) {
            message("Note deleted successfully", "home.php");
          }
        if($count == 0) {
          message("You have no notes", "add-note.php", "Add Note");
        }

       
      ?>
          <div class="list-notes">
            <?php
            while($row = mysqli_fetch_assoc($query)){
            ?>
            <a href="notes-detail.php?note_id=<?= $row['id']?>">
              <div class="event">
                <h4 class="title green"><?= $row['category']?></h4>
                <div class="sub-title">
                  <i class="fa fa-pencil"></i>
                  <h3><?= $row['title']?></h3>
                </div>
                <p class="description">
                 <?php
                  echo $row['body'].substr(0, 100) . "..."
                 ?>
                </p>
                <div class="time">
                  <i class="fas fa-calendar icon"></i>
                  <span class="text">Created At</span>
                  <span class="date"><?=  $row['created_at']?></span>
                </div>
              </div>
            </a>
              <?php
            }
              ?>
          </div>
        </div>
      </div>


      <div class="section_break"></div>
      <?php
include 'includes/footer.php';
?>