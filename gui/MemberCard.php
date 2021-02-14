<div class="oneMemberContainer">
  <a href="./trainee?trainee=<?php echo $memberEmail; ?>">
    <div class="oneMemberTop">
      <div>
        <img src="../image/undraw_profile_pic_ic5t.svg">
        <h4><?php echo $memberName; ?></h4>
        <small><?php echo $memberEmail; ?></small>
      </div>
      <div class="checkboxContainer">
        <label class="chkbx">
          <input type="checkbox" data="<?php echo $memberEmail; ?>" <?php echo ($payed) ? 'checked' : ''; ?>>
          <span class="x"></span>
        </label>
      </div>
    </div>
    <div class="oneMemberMidel">
      <ul>
        <li>
          <h4>T-Shirt</h4>
          <small><?php echo $t_shirt; ?></small>
        </li>
        <li class="center">
          <h4>Age</h4>
          <small><?php echo $memberAge; ?></small>
        </li>
        <li>
          <h4>Paid</h4>
          <small id="<?php echo $memberEmail; ?>Payed"><?php echo ($payed)? 'True' : 'False'; ?></small>
        </li>
      </ul>
    </div>
  </a>
</div>
