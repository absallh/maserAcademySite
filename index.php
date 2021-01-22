<?php
  include "Model/person.php";
  if (isset($_SESSION['permission'])){
    $person = New person();
    $person->enterTheSystem($_SESSION['permission']);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="image/icons8-stadium-80.png" type="image/icon type">
    <title>welcom to maser academy</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="index.php" method="post" class="sign-in-form" name="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="userName" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pass" required/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="login"/>
          </form>
          <form action="index.php" method="post" class="sign-up-form">
            <div class="singu_part" id="first_signup">
              <h2 class="title">Sign up</h2>
              <div class="input-field">
                <i class="fas fa-at"></i>
                <input type="email" placeholder="Email" name="email" maxlength="100" id="email" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="First Name" name="fname" maxlength="20" id="fname" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-signature"></i>
                <input type="text" placeholder="Last Name" name="lname" maxlength="20" id="lname" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" id="password" name="pass" maxlength="28" minlength="8" required/>
              </div>
              <div class="input-field" style="display:none;" id="repassword">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" onkeyup="validatePassword()" id="confirm_password" required/>
              </div>
              <div class="signup_btns">
                <input type="button" class="btn" value="next" onclick="validatePassword()" id="next_btn"/>
              </div>
            </div>
            <div class="singu_part" style="display:none;" id="second_signup">
              <div class="input-field">
                <i class="fas fa-birthday-cake"></i>
                <input type="text" placeholder="Birthday" onfocus="(this.type='date')" onblur="showBirthDayText()" name="birthday" id="birthday" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-phone-alt"></i>
                <input type="tel" placeholder="Phone Number" maxlength="11" minlength='11' name="phone" required/>
              </div>
              <div class="signup_btns">
                <input type="button" class="btn" value="previous" id="prev_btn"/>
                <input type="submit" class="btn" value="Sign up" name="signup"/>
              </div>
            </div>
          </form>
        </div>
      </div>


      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              new comer! join our team to became a profissional football player.
              And improve your skills to become better player. we can't wait till see your abileties.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="image/undraw_junior_soccer_6sop.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              If you one of the team and have already existing email at this system. you have not to signup again.
              And if you face a problem at your account. please tell your trainer.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="image/undraw_goal_0v5v.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
    <script>
    //birthday const difend in app.js
    function showBirthDayText(){
      if (!birthday.value){//if the birthday field is empty
        birthday.type = 'text';
      }
    }
    </script>
  </body>
</html>
<?php
  if (isset($_POST["login"])){
    $person = New person();
    $person->login($_POST["userName"], $_POST["pass"]);
  }
  if (isset($_POST["fname"])){
    $member = New Member();
    $member->signup($_POST["email"], $_POST["fname"], $_POST["lname"], $_POST["pass"], $_POST['birthday'], $_POST['phone']);
  }
 ?>
