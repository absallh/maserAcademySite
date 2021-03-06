<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../gui/style.css" />
    <link rel="stylesheet" href="../gui/editProfile.css" />
    <link rel="stylesheet" href="../gui/showPost.css" />
    <?php
      if ($_SESSION['permission'] == 1) {
        ?>
        <link rel="stylesheet" href="../gui/publishPost.css" />
        <link rel="stylesheet" href="../gui/AllMember.css" />
        <link rel="stylesheet" href="../gui/editTrainee.css" />
        <?php
      }
   ?>
    <link rel="icon" href="../image/icons8-stadium-80.png" type="image/icon type">
    <script src="https://kit.fontawesome.com/21523987e0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <title>Maser Academy</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">
          <h4>maser academy</h4>
        </div>
        <div class="hamburger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-links">
          <li id="homeLink"><a class="home" href="./"><i class="fas fa-home"></i>&nbsp;Home</a></li>
          <li id="profileLink">
            <a onclick="goToEditProfile();"><i class="fas fa-user-circle" id="NavImage"></i>&nbsp;<span id="NavprofileSpan"><?php echo $_SESSION['firstName']; ?></span></a>
          </li>
          <?php
            if ($_SESSION['permission'] == 1) {
              ?>
              <li class="allTraineeLink">
                <a onclick="goToAllTrainee();"><i class="fas fa-users"></i>&nbsp;All trainee</a>
              </li>
              <?php
            }
           ?>
          <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
        </ul>
      </nav>
    </header>
    <section class="landing"></section>
    <div class="fullScreen"></div>
