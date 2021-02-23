<script type="text/javascript">
  var editTraineePaying = false;
  function onBlurEditTraineeInput(inputObj) {
    if (inputObj.value) {
      inputObj.parentElement.classList.add("blur");
    }else {
      inputObj.parentElement.classList.remove("blur");
    }
  }
  function birthdayBlur() {
    if (!$('input[type="date"]').val()) {
      document.querySelector('input[type="date"]').type = 'text';
    }
  }
  function openEditTraineePayDate(oldDate) {
    editTraineePaying = true;
    $('.fullScreen').addClass('open');
    $('.editTrainee-editPayDate .input-container-editTrainee .input-editTrainee input').val(oldDate);
    $('.editTrainee-editPayDate .btn-editTrainee input[type="submit"]').val('Update Paying Date');
    $('.editTrainee-editPayDate h4').html('Edit the paying date');
    $('.editTrainee-editPayDate').addClass('fullScreen');
    document.querySelector('.editTrainee-editPayDate .input-container-editTrainee .input-editTrainee input[name="newDate"]').type = 'date';
    disableScroll();
  }
  function openAddPayingDate() {
    editTraineePaying = true;
    $('.fullScreen').addClass('open');
    $('.editTrainee-editPayDate .input-container-editTrainee .input-editTrainee input').val('');
    $('.editTrainee-editPayDate .btn-editTrainee input[type="submit"]').val('Add Paying Date');
    $('.editTrainee-editPayDate h4').html('Add paying date');
    $('.editTrainee-editPayDate').addClass('fullScreen');
    birthdayBlur();
    disableScroll();
  }
  function deleteTraineePayingDate(selectedDate) {
    if (confirm("Want to delete this paying date!")) {
      $('.editTrainee-editPayDate .input-container-editTrainee .input-editTrainee input').val(selectedDate);
      $('.editTrainee-editPayDate .btn-editTrainee input[type="submit"]').val('Delete Paying Date');
      $('.editTrainee-editPayDate .input-container-editTrainee .input-editTrainee input').removeAttr('required');
      $('.editTrainee-editPayDate .btn-editTrainee input[type="submit"]').click();
    }
  }
  function closeEditTraineePayDate() {
    editTraineePaying = false;
    $('.fullScreen').removeClass('open');
    $('.editTrainee-editPayDate').removeClass('fullScreen');
    enableScroll();
  }
  function deleteTrainee() {
    if (confirm("Want to delete this trainee!")) {
      $('input').removeAttr('required');
      $('.editTrainee-editPayDate .btn-editTrainee input[type="submit"]').val('Delete Member');
      $('.editTrainee-editPayDate .btn-editTrainee input[type="submit"]').click();
    }
  }
</script>
<form class="editTrainee-editPayDate" method="post">
  <h4></h4>
  <div class="input-container-editTrainee">
    <div class="input-editTrainee">
      <input type="text" onfocus="this.type='date';" onblur="birthdayBlur();" name="newDate" onblur="onBlurEditTraineeInput(this);" required/>
      <input type="hidden" name="oldDate" >
      <span class="input-bar-editTrainee"></span>
      <label>Date</label>
    </div>
  </div>
  <div class="btn-editTrainee">
    <input type="submit" class="btn" name="UpadtePayDate"/>
  </div>
</form>
<div class="editTrainee-containter">
  <form class="editTrainee-left-container" method="post">
    <div class="deleteTraineeBTN" onclick="deleteTrainee();">
      <i class="fas fa-user-times"></i> Delete
    </div>
    <h4>Personal Info</h4>
    <div class="input-container-editTrainee">
      <div class="input-editTrainee">
        <input type="email" name="mail" value="<?php echo $memberData['mail']; ?>" onblur="onBlurEditTraineeInput(this);" maxlength="100" required/>
        <input type="hidden" name="oldEmail" value="<?php echo $memberData['mail']; ?>">
        <span class="input-bar-editTrainee"></span>
        <label>Email</label>
      </div>
    </div>
    <div class="input-container-editTrainee">
      <div class="input-editTrainee">
        <input type="text" name="fname" value="<?php echo $memberData['firstName']; ?>" onblur="onBlurEditTraineeInput(this);" maxlength="20" required/>
        <span class="input-bar-editTrainee"></span>
        <label>First Name</label>
      </div>
      <div class="input-editTrainee">
        <input type="text" name="lname" value="<?php echo $memberData['lastName']; ?>" onblur="onBlurEditTraineeInput(this);" maxlength="20" required/>
        <span class="input-bar-editTrainee"></span>
        <label>Last Name</label>
      </div>
    </div>
    <div class="input-container-editTrainee">
      <div class="input-editTrainee">
        <input type="tel" name="phone" value="<?php echo $memberData['phone']; ?>" maxlength="11" minlength="11" onblur="onBlurEditTraineeInput(this);" required/>
        <span class="input-bar-editTrainee"></span>
        <label>Phone</label>
      </div>
    </div>
    <div class="input-container-editTrainee">
      <div class="input-editTrainee">
        <input type="date" name="birthday" onfocus="this.type='date';" value="<?php echo $memberData['age']; ?>" onblur="birthdayBlur();onBlurEditTraineeInput(this);" name="birthday" required/>
        <script>birthdayBlur();</script>
        <span class="input-bar-editTrainee"></span>
        <label>Birthday</label>
      </div>
      <div class="input-editTrainee">
        <input type="number" name="t-shirtNumber" value="<?php echo ($memberData['theNumber'] == null || $memberData['theNumber'] == '') ? '' : $memberData['theNumber']; ?>" min="1" onkeypress="return event.charCode >= 48" onblur="onBlurEditTraineeInput(this);" required/>
        <input type="hidden" name="oldT-shirt" value="<?php echo ($memberData['theNumber'] == null || $memberData['theNumber'] == '') ? '' : $memberData['theNumber']; ?>">
        <span class="input-bar-editTrainee"></span>
        <label>T-Shirt Number</label>
      </div>
    </div>
    <div class="input-container-editTrainee">
      <div class="input-editTrainee">
        <input type="password" name="pass" onblur="onBlurEditTraineeInput(this);" minlength="8" maxlength="28" required/>
        <span class="input-bar-editTrainee"></span>
        <label>New Password</label>
      </div>
    </div>
    <div class="btn-editTrainee">
      <script type="text/javascript">
        function removeRequiredAttr() {
          $('input[name="pass"]').removeAttr('required');
          $('input[name="t-shirtNumber"]').removeAttr('required');
        }
      </script>
      <input type="submit" class="btn" onclick="removeRequiredAttr();" value="Update Info" name="updateGenralInfo"/>
    </div>
  </form>
  <div class="editTrainee-reight-container">
    <h4>Paying Info</h4>
    <div class="tableContainer-editTrainee">
      <table class="table-editTrainee">
        <thead>
          <tr>
            <th>Month number</th>
            <th>Date of paying</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            if ($memberPayHistory == -1) {
              ?>
              <tr>
                <td></td>
                <td>the pay history is empty</td>
                <td></td>
              </tr>
              <?php
            }else {
              $index = count($memberPayHistory);
              foreach ($memberPayHistory as $paying) {
                ?>
                <tr>
                  <td><?php echo $index; ?></td>
                  <td><?php echo date("j-M-Y", strtotime($paying['payedDate'])); ?></td>
                  <td>
                    <div class="multi-button">
                      <button onclick="openEditTraineePayDate('<?php echo $paying['payedDate']; ?>');">Edit</button>
                      <button onclick="deleteTraineePayingDate('<?php echo $paying['payedDate']; ?>');">Delete</button>
                    </div>
                  </td>
                </tr>
                <?php
                $index--;
              }
            }
          ?>
        </tbody>
      </table>
    </div>
    <div class="btn-editTrainee">
      <input type="button" onclick="openAddPayingDate();" class="btn" value="Add Paying Date" name="addPayDate"/>
    </div>
  </div>
</div>
