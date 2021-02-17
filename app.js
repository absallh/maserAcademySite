$("#sign-up-btn").click(() => {
  $(".container").addClass("sign-up-mode");
});

$("#sign-in-btn").click( () => {
  $(".container").removeClass("sign-up-mode");
});

$('input[name="password"]').keyup(function() {
  if (!$(this).val()) {
    $('#confirm_pass').hide(500);
    $('input[name="confirm_pass"]').val('');
  }else {
    $('#confirm_pass').show(500);
  }
});
function validatePassword() {
  if ($('input[name="password"]').val() == $('input[name="confirm_pass"]').val()) {
    $('input[name="confirm_pass"]').get(0).setCustomValidity("");
    return true;
  }else {
    $('input[name="confirm_pass"]').get(0).setCustomValidity("Passwords Don't Match");
    $('input[name="confirm_pass"]').get(0).reportValidity();
    return false;
  }
}
$('input[name="confirm_pass"]').keyup(validatePassword);
$('input[name="next"]').click(function() {
  if (($('input[name="fname"]').get(0).reportValidity()) &&
      ($('input[name="lname"]').get(0).reportValidity()) &&
      ($('input[name="email"]').get(0).reportValidity()) &&
      ($('input[name="password"]').get(0).reportValidity()) &&
      validatePassword()) {
    $('.firstSingup').hide(500);
    $('.secondSignup').show(500);
    $('.secondSignup').css('display', 'flex');
  }
});

$('input[name="prevous"]').click(function() {
  $('.firstSingup').show(500);
  $('.secondSignup').hide(500);
  $('.firstSingup').css('display', 'flex');
});
