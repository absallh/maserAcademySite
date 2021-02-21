<?php
  //start the session
  include_once "../Model/admin.php";
  $model = new admin();
  if ((!isset($_GET['trainee'])) || ($_GET['trainee'] == "")) {
    header("Location: ./allTrainee");//redirect to all trainee page
    exit();
  }
  if (isset($_POST['updateGenralInfo'])) {
    if ($model->updateMemberInfo($_POST['oldEmail'], $_POST['mail'], $_POST['pass'],
                                $_POST['fname'], $_POST['lname'], $_POST['birthday'],
                                $_POST['phone'], $_POST['t-shirtNumber'], $_POST['oldT-shirt'])) {
      echo "<script>alert('updated successfully 😃');window.location.replace(window.location.href);</script>";
    }else {
      echo "<script>alert('some inputs was wrong 😢');window.location.replace(window.location.href);</script>";
    }

  }
  include "../gui/navbar.php";
?>
<main>
  <?php
    $memberData = $model->getMemberData($_GET['trainee']);
    $memberPayHistory = $model->getMemberPayHistory($_GET['trainee']);
    include '../gui/editTrainee.php';
  ?>
</main>
<?php
  include '../gui/footer.php';
?>
