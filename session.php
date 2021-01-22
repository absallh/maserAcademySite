<?php
  if(!isset($_SESSION['permission'])){
    header("Location: ../index.php");//redirect to login page
    exit();
  }
 ?>
