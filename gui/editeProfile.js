const oldpass = document.getElementById("oldpassword");
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

$(document).ready(function(){
  $('#password').keydown(function(){
    $("#repassword").show(1000);
  });
  $('#next_btn').click(function(){

    var passTXT = oldpass.value;
    var page_url = window.location.href;
    page_url = page_url.replace(page_url.split("/").pop(), '');
    $.getJSON(page_url+'urlHandler.php', {call_type: "editProfile", password: passTXT}, function(data, textStatus, xhr){
      console.log(data);
      oldpass.setCustomValidity(data.data);
      if((fname.reportValidity()) && (lname.reportValidity()) && (oldpass.reportValidity())) {
        $('#first_signup').hide(1000);
        $('#second_signup').show(1000);
      }
    });
  });

  $('#prev_btn').click(function(){
    $('#second_signup').hide(1000);
    $('#first_signup').show(1000);
  });
});
