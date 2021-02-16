<div class="editProfileContainer">
  <div class="reightEditProfile">
    <div class="top-reightEditProfile">
      <div>
        <img src="../image/undraw_profile_pic_ic5t.svg">
        <h4></h4>
        <small></small>
      </div>
    </div>
    <div class="midel-reightEditProfile">
      <div class="midel-reightEditProfile-btn active" onclick="openEditSection(this, 'EditGeneralInfo');">
        <h4><i class="fas fa-cogs"></i> General</h4>
      </div>
      <div class="midel-reightEditProfile-btn" onclick="openEditSection(this, 'EditContactInfo');">
        <h4><i class="fas fa-phone-square-alt"></i> Contact Info</h4>
      </div>
      <div class="midel-reightEditProfile-btn" onclick="openEditSection(this, 'EditSecurity');">
        <h4><i class="fas fa-user-shield"></i> Security</h4>
      </div>
      <div id="payHistoryBTN" class="midel-reightEditProfile-btn" onclick="openEditSection(this, 'EditPayHistory');">
        <h4><i class="far fa-credit-card"></i> Pay History</h4>
      </div>
    </div>
  </div>
  <div class="mainEditProfile">
    <div id="EditGeneralInfo" class="mainEditProfile-section active">
      <div class="top-mainEditProfile">
         <div class="editProfileBurger" onclick="openEditProfileMenu();">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <h4>General Info</h4>
      </div>
      <div class="midel-mainEditProfile">
        <div class="left-midel-mainEditProfile">
          <div class="twoInputContainer-mainEditProfile">
            <div class="inputContainer-mainEditProfile">
              <span>First Name</span>
              <div class="input-mainEditProfile">
                <i class="fas fa-user"></i>
                <input type="text" name="firstName" value="" required>
              </div>
            </div>
            <div class="inputContainer-mainEditProfile">
              <span>Last Name</span>
              <div class="input-mainEditProfile">
                <i class="fas fa-signature"></i>
                <input type="text" name="lastName" value="" required>
              </div>
            </div>
          </div>
          <div class="inputContainer-mainEditProfile">
            <span>Birthday</span>
            <div class="input-mainEditProfile">
              <i class="fas fa-birthday-cake"></i>
              <input type="date" name="birthday" value="" required/>
            </div>
          </div>
          <div class="btn-mainEditProfile">
            <input type="button" class="btn" value="Update Info" name="updateGenralInfo"/>
          </div>
        </div>
        <div class="reight-midel-mainEditProfile">
          <img src="../image/undraw_profile_details_f8b7.svg">
          <p id="t-shirtNumberP">your T-shirt number is 10</p>
        </div>
      </div>
    </div>
    <div id="EditContactInfo" class="mainEditProfile-section">
      <div class="top-mainEditProfile">
         <div class="editProfileBurger" onclick="openEditProfileMenu();">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <h4>Contact Info</h4>
      </div>
      <div class="midel-mainEditProfile">
        <div class="left-midel-mainEditProfile">
          <div class="inputContainer-mainEditProfile">
            <span>Phone Number</span>
            <div class="input-mainEditProfile">
              <i class="fas fa-phone-alt"></i>
              <input type="tel" name="phoneNumber" value="" maxlength="11" minlength="11" required>
            </div>
          </div>
          <div class="btn-mainEditProfile">
            <input type="button" class="btn" value="Update Info" name="updateGenralInfo"/>
          </div>
        </div>
        <div class="reight-midel-mainEditProfile">
          <img src="../image/undraw_Chatting_re_j55r.svg">
          <p>Make sure that your phone number is corect.<br>We hope that you enter a whatsapp number.</p>
        </div>
      </div>
    </div>
    <div id="EditSecurity" class="mainEditProfile-section">
      <div class="top-mainEditProfile">
         <div class="editProfileBurger" onclick="openEditProfileMenu();">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <h4>Security Info</h4>
      </div>
      <div class="midel-mainEditProfile">
        <div class="left-midel-mainEditProfile">
          <div class="inputContainer-mainEditProfile">
            <span>Old Password</span>
            <div class="input-mainEditProfile">
              <i class="fas fa-lock-open"></i>
              <input type="password" name="oldPass" required>
            </div>
          </div>
          <div class="twoInputContainer-mainEditProfile">
            <div class="inputContainer-mainEditProfile">
              <span>New Password</span>
              <div class="input-mainEditProfile">
                <i class="fas fa-lock"></i>
                <input type="password" name="newPass" maxlength="28" minlength="8" required>
              </div>
            </div>
            <div class="inputContainer-mainEditProfile">
              <span>Confirm Password</span>
              <div class="input-mainEditProfile">
                <i class="fas fa-user-lock"></i>
                <input type="password" name="confirmPass" required>
              </div>
            </div>
          </div>
          <div class="btn-mainEditProfile">
            <input type="button" class="btn" value="Update Info" name="updateGenralInfo"/>
          </div>
        </div>
        <div class="reight-midel-mainEditProfile">
          <img src="../image/undraw_Security_on_ff2u.svg">
          <p>The password is your responsibility.<br>Don't give it to anyone.</p>
        </div>
      </div>
    </div>
    <div id="EditPayHistory" class="mainEditProfile-section">
      <div class="top-mainEditProfile">
         <div class="editProfileBurger" onclick="openEditProfileMenu();">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <h4>Pay History</h4>
      </div>
      <div class="midel-mainEditProfile">
        <div class="left-midel-mainEditProfile">
          <div class="tableContainer-editProfile">
            <table class="table-editProfile">
            <thead>
              <tr>
                <th>Month number</th>
                <th>Date of paying</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          </div>
        </div>
        <div class="reight-midel-mainEditProfile">
          <img src="../image/undraw_wallet_aym5.svg">
          <p>All the avilable pay history appear here.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('main').css("margin-top","10vh");
  $('.input-mainEditProfile input').focus(function() {
    $( this ).parent('.input-mainEditProfile').addClass('focus');
  });
  $('.input-mainEditProfile input').blur(function() {
    $( this ).parent('.input-mainEditProfile').removeClass('focus');
  });
</script>
