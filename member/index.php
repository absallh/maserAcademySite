<?php
  //start the session
  include_once "../Model/member.php";
  $model = new member();
  include "../gui/navbar.php";
?>
<main>
  <?php
    $model->showTopPosts();
   ?>
</main>
<?php
  include "../gui/footer.php";
?>
