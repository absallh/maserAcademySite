<?php
  //start the session
  include_once "../Model/member.php";
  $model = new member();
  if (isset($_GET['comment'])) {
    $model->comment($_GET['comment'], $_GET['commentTXT']);
  }
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
