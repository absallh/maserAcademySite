<?php
  include_once "../Model/admin.php";
  include "../gui/navbar.html";
  $model = new admin();
?>
<main>
  <?php include "../gui/makePost.html"; ?>
  <div class="content">
    <div class="content_center">
        <?php
          include "../gui/post.php";
          include "../gui/post.php";
         ?>
     </div>
   </div>
</main>
<script src="../gui/admin.js"></script>
<?php
  require "../gui/profile.js.php";
  include "../gui/footer.html";
?>
