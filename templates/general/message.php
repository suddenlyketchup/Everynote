<?php
function message($message, $close_link, $button_name = "close") {
?>
  <!-- Start Message -->
  <div class="message section-border-radius">
        <p class="text">
          <?= $message?>
        </p>
        <button class="btn-discover" onclick="window.location.href = '<?= $close_link?>'"><?= $button_name?></button>
      </div>

<?php
}
function message1($message, $close_link) {
  ?>
    <!-- Start Message -->
    
    <p style="color: green; font-size:16px;"><?= $message?></p
  <?php
  }
?>
