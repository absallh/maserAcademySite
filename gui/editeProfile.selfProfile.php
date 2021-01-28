<?php
  include "../gui/navbar.html";
?>
<main>
<?php
  if (isset($_POST['fname'])) {
    $password = $_POST['oldpass'];
    if (!empty($_POST['pass'])) {
      $password = $_POST['pass'];
    }
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
    if($model->updateInfo($password, $_POST['fname'], $_POST['lname'], $birthday, $_POST['phone'])){
      echo "<script>alert('your info has been updated');</script>";
    }else {
      echo "<script>alert('your entered phone number that is set to another account');</script>";
    }
  }
  include "../gui/editProfile.html";
  include "../gui/profile.js.php";
?>
</main>
<?php
  include "../gui/footer.html";
 ?>
