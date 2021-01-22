<?php
    include "../session.php";
    if ($_SESSION['permission'] != 2){
      header("Location: ../index.php");
      exit();
    }
