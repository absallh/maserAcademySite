<div class="editProfileContainer">
  <div class="reightEditProfile">
    <div class="top-reightEditProfile">
      <div>
        <img src="../image/undraw_profile_pic_ic5t.svg">
        <h4><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];?></h4>
        <small><?php echo $_SESSION["email"]; ?></small>
      </div>
    </div>
    <div class="midel-reightEditProfile">
      <div class="midel-reightEditProfile-btn">
        <h4><i class="fas fa-cogs"></i> General</h4>
      </div>
      <div class="midel-reightEditProfile-btn active">
        <h4><i class="fas fa-phone-square-alt"></i> Contact Info</h4>
      </div>
      <div class="midel-reightEditProfile-btn">
        <h4><i class="fas fa-user-shield"></i> Security</h4>
      </div>
      <div class="midel-reightEditProfile-btn">
        <h4><i class="far fa-credit-card"></i> Pay History</h4>
      </div>
    </div>
  </div>
  <div class="mainEditProfile">
    <div id="EditGeneralInfo" class="active"></div>
    <div id="EditContactInfo"></div>
    <div id="EditSecurity"></div>
    <div id="EditPayHistory"></div>
  </div>
</div>
<script type="text/javascript">
  $('main').css("margin-top","10vh");
</script>
