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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="./" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="userName" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" placeholder="Password" />
            </div>
            <input type="submit" value="login" name="login" class="btn solid" />
          </form>
          <form method="post" action="./" class="sign-up-form">
            <div class="firstSingup">
              <h2 class="title">Sign up</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="fname" placeholder="First Name" maxlength="20" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-signature"></i>
                <input type="text" name="lname" placeholder="Last Name" maxlength="20" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-at"></i>
                <input type="email" name="email" placeholder="Email" maxlength="100" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="28" required/>
              </div>
              <div class="input-field" id="confirm_pass" style="display:none;">
                <i class="fas fa-key"></i>
                <input type="password" name="confirm_pass" placeholder="Confirm Password" required/>
              </div>
              <input type="button" class="btn" name="next" value="Next" />
            </div>
            <div class="secondSignup">
              <h2 class="title">More Info</h2>
              <div class="input-field">
                <i class="fas fa-birthday-cake"></i>
                <script>
                  function birthdayBlur() {
                    if (!$('input[name="birthday"]').val()) {
                      document.querySelector('input[name="birthday"]').type = 'text';
                    }
                  }
                </script>
                <input type="text"  onfocus="this.type='date';" onblur="birthdayBlur();" name="birthday" placeholder="Birthday" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-phone-alt"></i>
                <input type="tel" name="phone" placeholder="Phone Number" minlength='11' maxlength="11" required/>
              </div>
              <div class="twoBTN">
                <input type="button" class="btn" name="prevous" value="Prevous" />
                <input type="submit" class="btn" name="singup" value="sing up" />
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
  </body>
</html>
<?php
  if (isset($_POST["login"])){

    $person = New person();
    $person->login($_POST["userName"], $_POST["pass"]);
  }
  if (isset($_POST["singup"])){
    $member = New Member();
    $member->signup($_POST["email"], $_POST["fname"], $_POST["lname"], $_POST["pass"], $_POST['birthday'], $_POST['phone']);
  }
 ?>
