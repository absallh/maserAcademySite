<?php
include_once "../Model/member.php";//decleare the member sission
$model = new member();
include '../gui/navbar.php';
?>
<main>
  <?php include '../gui/editeProfile.php'; ?>
</main>
<?php
include '../gui/footer.php';
?>
