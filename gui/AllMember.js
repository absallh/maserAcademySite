$(".search-btn").click(function(){
  $(".search-input").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".search-input").val("");
});
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
    $.getJSON(page_url+'urlHandler.php', {call_type: "memberNotPayed", member: $(this).attr('data')}, function() {
      payedTxt.innerHTML = 'False';
      console.log($(this).attr('data'));
    });
  }
});
