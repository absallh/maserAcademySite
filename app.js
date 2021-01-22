const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const birthday = document.getElementById("birthday");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

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
    if(email.reportValidity() && (fname.reportValidity()) && (lname.reportValidity()) &&
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
