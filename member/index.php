<?php
include_once "../Model/member.php";
include "../gui/navbar.html";
$model = new member();
?>
<main>
  <?php
    include "../gui/showHomePosts.php";
  ?>
</main>
<script src="../gui/admin.js"></script>
<?php
  require "../gui/profile.js.php";
  include "../gui/footer.html";
?>
