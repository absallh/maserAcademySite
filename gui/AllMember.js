$(".search-btn").click(function(){
  $(".search-input").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".search-input").val("");
});

function checkboxOnclick() {
  $('input[type="checkbox"]').click(function(){
    var page_url = window.location.href;
    page_url = page_url.replace(page_url.split("/").pop(), '');
    var payedTxt = document.getElementById($(this).attr('data')+'Payed');

    if($(this).attr("checked") == true){
      $.getJSON(page_url+'urlHandler.php', {call_type: "memberCheckedPayed", member: $(this).attr('data')}, function() {
        payedTxt.innerHTML = 'True';
        console.log($(this).attr('data'));
      });
    }
    else{
      $.getJSON(page_url+'urlHandler.php', {call_type: "memberNotPayed", member: $(this).attr('data')}, function(data) {
        payedTxt.innerHTML = 'False';
        console.log($(this).attr('data'));
      });
    }
  });
}
checkboxOnclick();

$('.search-input').keyup(function() {
  var page_url = window.location.href;
  page_url = page_url.replace(page_url.split("/").pop(), '');
  var searchTxt = $('.search-input').val();
  if (searchTxt == null) {
    searchTxt = '';
  }
  $.getJSON(page_url+'urlHandler.php', {call_type: "searchOnMembers", keySearch: searchTxt}, function (data) {
    console.log(data.data);
    $('.allMemberContainer').html('');
    if (data.data != -1) {
      data.data.forEach((member, i) => {
        console.log(member);
        $('.allMemberContainer').append('<div class="oneMemberContainer">'
        +'<a href="./trainee?trainee='+ member.mail +'">'
        +'<div class="oneMemberTop"><div><img src="../image/undraw_profile_pic_ic5t.svg">'
        +'<h4>'+member.firstName+' '+member.lastName+'</h4>'
        +'<small>'+member.mail+'</small>'
        +'</div><div class="checkboxContainer"><label class="chkbx">'
        +'<input type="checkbox" data="'+member.mail+'"'+ ((member.payed == '1') ? 'checked' : '') +'>'
        +'<span class="x"></span></label></div></div><div class="oneMemberMidel"><ul><li><h4>T-Shirt</h4>'
        +'<small>'+((member.number == null) ? 'None' : member.number)+'</small>'
        +'</li><li class="center"><h4>Age</h4>'+'<small>'+member.age+'</small>'
        +'</li><li><h4>Paid</h4>'
        +'<small id="'+member.mail+'Payed">'+((member.payed == '1') ? 'True' : 'False')+'</small>'
        +'</li></ul></div></a></div>');
      });
      checkboxOnclick();
    }else {
      $('.allMemberContainer').html('<center>No members look like this!</center>');
    }
  });
});
