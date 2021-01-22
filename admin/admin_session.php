<?php
    include "../session.php";
    if ($_SESSION['permission'] != 1){
      header("Location: ../index.php");
      exit();
    }
 ?>
