<?php
  if(!isset($_SESSION['permission'])){
    header("Location: ../index.php");//redirect to login page
    exit();
  }
  define("GMAILUSERNAME", "masracademy100@gmail.com");
  define("GMAILPASS", "Omar1520");
 ?>
