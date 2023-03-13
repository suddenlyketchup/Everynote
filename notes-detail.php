<?php
include 'includes/header.php';
include 'templates/general/message.php';
if(!isset($_GET['note_id'])) {
    header("location: home.php");
}


$note_id = $_GET['note_id'];

$sql = "SELECT * FROM notes WHERE id='$note_id'";
$query = mysqli_query($db, $sql);
$count = mysqli_num_rows($query);
$note = mysqli_fetch_assoc($query);

if($count == 0) {
    header("location: home.php");
}


?>
<main class="main">
    <?php include 'templates/general/sidebar.php'; ?>
    <div class="content">

        <div class="container">

            <?php  include 'templates/general/navbar.php' ?>

            <div class="notes-calendar">
                <?php
                if(isset($_GET['update'])) {
                        message("Note updated successfully", "notes-detail.php?note_id=$note_id");
                }?>
                <!-- Start Events -->
                <div class="notes">
                    <h2 class="notes-header"><?=  $note['title']?></h2>
                    <div class="manage-notes">
                        <a href="edit-note.php?id=<?= $note['id']?>" class="button edit-note"><i class="fas fa-edit"></i> Edit</a>
                        <a href="delete-note.php?id=<?= $note['id']?>" class="button delete-note"><i class="fas fa-trash"></i>Delete</a>
                    </div>
                    <div class="mb-20">
                        <div class="event">
                            <p class="description">
                               <?= $note['body']?>
                            </p>

                            <h4 class="title green"><?= $note['category']?></h4>
                            <div class="time">
                                <i class="fas fa-calendar icon"></i>
                                <span class="text">Created At</span>
                                <span class="date"><?= $note['created_at']?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
include 'includes/footer.php';
?>