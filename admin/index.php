<?php
  include_once "../Model/admin.php";
  include "../gui/navbar.html";
  $model = new admin();
?>
<main>
  <?php
    include "../gui/makePost.html";
    if (isset($_POST['makePost'])){
      $model->publishAPost($_POST['postTXT'], $_FILES['file']);
    }
    include "../gui/showHomePosts.php";
  ?>
</main>
<script src="../gui/admin.js"></script>
<?php
  require "../gui/profile.js.php";
  include "../gui/footer.html";
?>
