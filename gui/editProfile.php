<link rel="stylesheet" href="../style.css">
<div class="container sign-up-mode">
  <div class="forms-container">
    <div class="signin-signup">
      <form id="editProfileForm" method="post" class="sign-up-form">
        <div class="singu_part" id="first_signup">
          <h2 class="title">Edit account</h2>
          <div style=" width:70%;">
            <label for="fname" >First Name</label>
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="First Name" name="fname" maxlength="20" id="fname" required/>
          </div>
          <div style="width:70%;">
            <label for="lname">Last Name</label>
          </div>
          <div class="input-field">
            <i class="fas fa-signature"></i>
            <input type="text" placeholder="Last Name" name="lname" maxlength="20" id="lname" required/>
          </div>
          <div style="width:70%;">
            <label for="password">Password</label>
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
          <div style="width:70%;">
            <label for="birthday">Birthday</label>
          </div>
          <div class="input-field">
            <i class="fas fa-birthday-cake"></i>
            <input type="text" placeholder="Birthday" onfocus="(this.type='date')" onblur="showBirthDayText()" name="birthday" id="birthday" value="<?php echo $_SESSION['birthday'];?>" required/>
          </div>
          <div style="width:70%;">
            <label for="phone">Phone</label>
          </div>
          <div class="input-field">
            <i class="fas fa-phone-alt"></i>
            <input type="tel" placeholder="Phone Number" maxlength="11" minlength='11' name="phone" id="phone" required/>
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
    <div class="panel left-panel"></div>
    <div class="panel right-panel">
      <div class="content" style="display:block; width:70vh;">
        <h3 id="shirtH3">your T-shirt number: <strong id="tnumber">10</strong></h3>
        <p>
          your email is "<strong id="email"></strong>"
        </p>
      </div>
      <img src="../image/undraw_data_trends_b0wg.svg" class="image" alt="" />
    </div>
  </div>
</div>
<script src="../gui/editeProfile.js"></script>
