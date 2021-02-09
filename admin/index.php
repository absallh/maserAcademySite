<?php
  //start the session
  include_once "../Model/admin.php";
  $model = new admin();
  include "../gui/navbar.php";
?>
<main>
  <div class="centerDiv">
    <?php
      include "../gui/publishPost.html";
     ?>
  </div>
  <?php
    $model->showTopPosts();
   ?>
   <script src="../gui/closeFullScreen.js" charset="utf-8"></script>
   <script src="../gui/showPost.js" charset="utf-8"></script>
</main>
<?php
  include "../gui/footer.html";
?>
