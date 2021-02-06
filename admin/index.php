<?php
  //start the session
  include_once "../Model/admin.php";
  $model = new admin();
  include "../gui/navbar.php";
?>
<main>
  <?php
    include "../gui/publishPost.html";
   ?>
</main>
<?php
  include "../gui/footer.html";
?>
