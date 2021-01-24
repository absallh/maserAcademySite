const container = document.querySelector(".container");
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const birthday = document.getElementById("birthday");

function makeRPassVisiable (){
  document.getElementById("repassword").style.display = "grid";
}

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
    return false;
  } else {
    confirm_password.setCustomValidity("");
    return true;
  }
}
//birthday const difend in app.js
function showBirthDayText(){
  if (!birthday.value){//if the birthday field is empty
    birthday.type = 'text';
  }
}

$(document).ready(function(){

  $('#password').keydown(function(){
    $("#repassword").show(1000);
  });

  $('#next_btn').click(function(){
    if((fname.reportValidity()) && (lname.reportValidity()) &&
    (password.reportValidity()) && (confirm_password.reportValidity()) && validatePassword()){
      $('#first_signup').hide(1000);
      $('#second_signup').show(1000);
    }
  });

  $('#prev_btn').click(function(){
    $('#second_signup').hide(1000);
    $('#first_signup').show(1000);
  });
});
