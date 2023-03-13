<?php
include 'includes/header.php';
include 'templates/general/message.php';
$user_id = $_SESSION['d7a68b9b8b107b87a8faaa791c6fcbc7'];
$message = '';
if(isset($_POST['add_note'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $body = trim(mysqli_real_escape_string($db, $_POST['body']));
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $sql = "INSERT INTO notes (title, body, category, user_id) VALUES ('$title', '$body', '$category', '$user_id')";
  $query = mysqli_query($db, $sql);
  if($query) {
    $message = 'Note added successfully';
  ?>
  <script>
    document.querySelector('#form-add-note').reset();
  </script>
  <?php
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }
}

// $sql = "INSERT INTO `notes` (`title`, `body`, `category`, `user_id`, `created_at`) VALUES (NULL, '', '', '', '', NOW());"
?>
<main class="main">
  <?php include 'templates/general/sidebar.php'; ?>
  <div class="content">

    <div class="container">

      <?php  include 'templates/general/navbar.php' ?>
      <div class="add-notes">
          
    <!-- message -->
    <?php
      if(!empty($message)) {
        message($message, 'home.php', 'Go to Home');
      }
    ?>
        <h1 class="mt-10">Add Notes</h1>
        <form action="add-note.php" method="POST" id="form-add-note">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
        </div>
        <div class="form-group">
          <label for="title">Note Category</label>
          <input type="text" class="form-control" id="Category" placeholder="Note Category" name="category" required>
        </div>
        <div class="form-group ">
          <label for="editor">Note</label>
          <textarea name="body" style="height: 180px; border: 1px solid #ccc; border-radius: 5px;" name="body" placeholder="enter your notes" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="button mb-10" name="add_note">Add Note</button>
        </div>
        </form>
      </div>

      <?php
include 'includes/footer.php';
?>