<?php
  //start the session
  include_once "../Model/member.php";
  $model = new member();
  include "../gui/navbar.php";
?>
<main>
  <?php
    include "../gui/showPost.php";
    include "../gui/showPost.php";
   ?>
   <script src="../gui/closeFullScreen.js" charset="utf-8"></script>
   <script src="../gui/showPost.js" charset="utf-8"></script>
</main>
<?php
  include "../gui/footer.html";
?>
