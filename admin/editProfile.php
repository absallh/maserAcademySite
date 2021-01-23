<?php
include_once "../Model/admin.php";
$admin_model = new admin();
include "../gui/navbar.html";
?>
<main>
  <?php
  include "../gui/editProfile.php";
  ?>
</main>
<?php
include "../gui/footer.html";
?>
