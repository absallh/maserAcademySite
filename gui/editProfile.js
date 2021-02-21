var editProfileMenu = false;
function openEditSection(clicked_btn, section) {
  loadEditProfileData();
  if (!clicked_btn.classList.contains('active')) {
    $('.midel-reightEditProfile-btn').removeClass('active');
    clicked_btn.classList.add('active');
    $('.mainEditProfile-section').hide(0);
    $('#'+section).show(500);
    $('.mainEditProfile-section').removeClass('active');
    $('#'+section).addClass('active');
  }
  closeEditProfileMenu();
}
function openEditProfileMenu() {
  editProfileMenu = true;
  $('.reightEditProfile').addClass('open');
  $('.fullScreen').addClass('exitPostMenu');
}
function closeEditProfileMenu() {
  editProfileMenu = false;
  $('.reightEditProfile').removeClass('open');
  $('.fullScreen').removeClass('exitPostMenu');
}
function loadEditProfileData() {
  var pageName = window.location.pathname.split("/").pop();
  if (pageName == 'profile') {
    var page_url = window.location.href;
    page_url = page_url.replace(page_url.split("/").pop(), '');
    $.getJSON(page_url+'urlHandler.php', {call_type: 'getUserData'}, function(data, textStatus, xhr) {
      console.log(data.data);
      $('.top-reightEditProfile div h4').html(data.data.firstName+' '+data.data.lastName);
      $('.top-reightEditProfile div small').html(data.data.mail);
      $('input[type="password"]').val('');
      $('input[name="firstName"]').val(data.data.firstName);
      $('input[name="lastName"]').val(data.data.lastName);
      $('input[name="birthday"]').val(data.data.age);
      $('#t-shirtNumberP').html((data.data.permission == '1') ? 'Hello coach!' : 'your T-shirt number is '+data.data.theNumber);
      $('input[name="phoneNumber"]').val(data.data.phone);
      if (data.data.permission == '1') {
        $('#payHistoryBTN').remove();
        $('#EditPayHistory').remove();
      }else {
        $.getJSON(page_url+'urlHandler.php', {call_type: 'getMemberPayHistory'}, function(data, textStatus, xhr) {
          console.log(data.data);
          $('.table-editProfile tbody').html('');
          if (data.data != -1) {
            data.data.forEach((pay, i) => {
              $('.table-editProfile tbody').append('<tr><td>'+(data.data.length - i)+'</td><td>'+pay.payedDate+'</td>');
            });
          }else {
            $('.table-editProfile tbody').append('<tr><td>the pay history is empty</td><td></td></tr>');
          }
        });
      }
    });
  }
}
loadEditProfileData();


function validatePassword() {
  var page_url = window.location.href;
  page_url = page_url.replace(page_url.split("/").pop(), '');
  var password = document.querySelector('input[name="newPass"]');
  var confirm_password = document.querySelector('input[name="confirmPass"]');
  var oldPass = document.querySelector('input[name="oldPass"]');
  $.getJSON(page_url+'urlHandler.php', {call_type: 'validateOldPassword', email: $('.top-reightEditProfile div small').html(), password: $('input[name="oldPass"]').val()}, function(data, textStatus, xhr) {
    oldPass.setCustomValidity(data.data);
  });
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity("");
  }
}
function updateINFO() {
  var page_url = window.location.href;
  page_url = page_url.replace(page_url.split("/").pop(), '');
  if (!$('#EditSecurity').hasClass('active')) {
    $.getJSON(page_url+'urlHandler.php', {call_type: 'updateINFO', firstName: $('input[name="firstName"]').val(),
      lastName: $('input[name="lastName"]').val(), birthday: $('input[name="birthday"]').val(), password: '',
      phoneNumber: $('input[name="phoneNumber"]').val()}, function(data, textStatus, xhr) {
        //start the function
        $('#NavprofileSpan').html($('input[name="firstName"]').val());
        loadEditProfileData();
        alert('Updated successfully😃');
        //end the function
    });
  }else {
    validatePassword();
    var password = document.querySelector('input[name="newPass"]');
    var confirm_password = document.querySelector('input[name="confirmPass"]');
    if (password.reportValidity() && confirm_password.reportValidity()) {
      $.getJSON(page_url+'urlHandler.php', {call_type: 'updateINFO', firstName: $('input[name="firstName"]').val(),
        lastName: $('input[name="lastName"]').val(), birthday: $('input[name="birthday"]').val(), password: $('input[name="newPass"]').val(),
        phoneNumber: $('input[name="phoneNumber"]').val()}, function(data, textStatus, xhr) {
          //start the function
          alert('password Updated successfully😃');
          //end the function
      });
    }
  }
}
