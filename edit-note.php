<?php
include 'includes/header.php';
// if (!isset($_GET['id'])) {
//     header("location: home.php");
// }

$id = $_GET['id'];

$sql = "SELECT * FROM notes WHERE id='$id'";
$query = mysqli_query($db, $sql);
$count = mysqli_num_rows($query);
$note = mysqli_fetch_assoc($query);

// if ($count == 0) {
//     header("location: home.php");
// }
$message = "";
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $body = trim(mysqli_real_escape_string($db, $_POST['body']));
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $sql = "UPDATE notes SET title='$title', body='$body', category='$category' WHERE id='$id';";
    $update = mysqli_query($db, $sql);
    if ($update) {
        header("location: notes-detail.php?note_id=$id&update=success");
    } else {
        echo "Update failed please contact the developer";
        exit();
    }
}

// $sql = "update where note_id='$id'"
// $sql = "INSERT INTO `notes` (`title`, `body`, `category`, `user_id`, `created_at`) VALUES (NULL, '', '', '', '', NOW());"
?>
<main class="main">
  <?php include 'templates/general/sidebar.php';?>
  <div class="content">

    <div class="container">

      <?php include 'templates/general/navbar.php'?>
      <div class="add-notes">
        <h1 class="mt-10">Edit Notes</h1>

    <?php
if (!empty($message)) {
    ?>
      <h2><?=$message?></h2>
    <?php
}
?>
        <form action="edit-note.php?id=<?=$id?>" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?=$note['title']?>">
        </div>
        <div class="form-group">
          <label for="title">Note Category</label>
          <input type="text" class="form-control" id="Category" placeholder="Note Category" name="category" value=<?=$note['category']?>>
        </div>
        <div class="form-group ">
          <label for="editor">Note</label>
          <textarea name="body" placeholder="enter your notes" name="body" rows="6">
            <?=$note['body']?>
            </textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="button mb-10" name="update">Update Note</button>
        </div>
        </form>
      </div>

      <?php
include 'includes/footer.php';
?>