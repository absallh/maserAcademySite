var editProfileMenu = false;
function openEditSection(clicked_btn, section) {
  if (!clicked_btn.classList.contains('active')) {
    $('.midel-reightEditProfile-btn').removeClass('active');
    clicked_btn.classList.add('active');
    $('.mainEditProfile-section').hide(0);
    $('#'+section).show(500);
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
  var page_url = window.location.href;
  page_url = page_url.replace(page_url.split("/").pop(), '');
  $.getJSON(page_url+'urlHandler.php', {call_type: 'getUserData'}, function(data, textStatus, xhr) {
    console.log(data.data);
    $('.top-reightEditProfile div h4').html(data.data.firstName+' '+data.data.lastName);
    $('.top-reightEditProfile div small').html(data.data.mail);
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
loadEditProfileData();
