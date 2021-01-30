<?php
  include_once "../Model/admin.php";
  include "../gui/navbar.html";
  $model = new admin();
?>
<main>
  <?php
    include "../gui/makePost.html";
    include "../gui/showHomePosts.php";
  ?>
</main>
<script src="../gui/admin.js"></script>
<?php
  require "../gui/profile.js.php";
  include "../gui/footer.html";
?>
