<?php
  //start the session
  include_once "../Model/admin.php";
  $model = new admin();
  if ((!isset($_GET['trainee'])) || ($_GET['trainee'] == "")) {
    header("Location: ./allTrainee");//redirect to all trainee page
    exit();
  }else {
    $memberData = $model->getMemberData($_GET['trainee']);
    if ($memberData == -1) {
      header("Location: ./allTrainee");//redirect to all trainee page
      exit();
    }
  }
  if (isset($_POST['updateGenralInfo'])) {
    if ($model->updateMemberInfo($_GET['trainee'], $_POST['mail'], $_POST['pass'],
                                $_POST['fname'], $_POST['lname'], $_POST['birthday'],
                                $_POST['phone'], $_POST['t-shirtNumber'], $_POST['oldT-shirt'])) {
      echo "<script>alert('updated successfully 😃');window.location.href = window.location.href;</script>";
      exit;
    }else {
      echo "<script>alert('some inputs was wrong 😢');window.location.href = window.location.href;</script>";
      exit;
    }
  }
  if (isset($_POST['UpadtePayDate'])) {
    if ($_POST['UpadtePayDate'] == "Update Paying Date") {
      if ($model->updatePayingDate($_GET['trainee'], $_POST['newDate'], $_POST['oldDate'])) {
        echo "<script>alert('Date updated successfully 😃');window.location.href = window.location.href;</script>";
      }else {
        echo "<script>alert('some inputs was wrong 😢');window.location.href = window.location.href;</script>";
      }
    }elseif ($_POST['UpadtePayDate'] == "Add Paying Date"){
      if($model->addPayingDate($_GET['trainee'], $_POST['newDate'])){
        echo "<script>alert('Date added successfully 😃');window.location.href = window.location.href;</script>";
      }else {
        echo "<script>alert('some inputs was wrong 😢');window.location.href = window.location.href;</script>";
      }
    }elseif ($_POST['UpadtePayDate'] == "Delete Paying Date") {
      if ($model->deletePayingDate($_GET['trainee'], $_POST['newDate'])) {
        echo "<script>alert('Date deleted successfully 😃');window.location.href = window.location.href;</script>";
      }else {
        echo "<script>alert('something was wrong 😢');window.location.href = window.location.href;</script>";
      }
    }
    elseif ($_POST['UpadtePayDate'] == "Delete Member") {
      $model->deleteMember($_GET['trainee']);
    }
  }
  include "../gui/navbar.php";
?>
<main>
  <?php
    $memberPayHistory = $model->getMemberPayHistory($_GET['trainee']);
    include '../gui/editTrainee.php';
  ?>
</main>
<?php
  include '../gui/footer.php';
?>
