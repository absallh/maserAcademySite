$('.publishPostMiddel textarea').focus(function() {
  $('.fullScreen').addClass('open');
  $('.publishPostContainer').addClass('fullmode');
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  $('.publishPostMiddel textarea').animate({height: "20vh"}, 500);
  $('.publishPostMiddel textarea').css('overflow','visible');
  $('.publishPostContainer .publishPostTop .closeBtn').show(500);
  $('.publishPostMiddel span').show(500);
  $('.publishPostBottom').show(500);
  makePostModeON = true;
  disableScroll();
});
$('.publishPostMiddel textarea').keyup(function(){
  if ($(this).val()) {
    $('.publishPostBottom button').attr('disabled', false);
  }else {
    $('.publishPostBottom button').attr('disabled', true);
  }
});
function closePublishPost() {
  $('.fullScreen').removeClass('open');
  $('.publishPostContainer').removeClass('fullmode');
  $('.publishPostMiddel textarea').animate({height: "7vh"}, 500);
  $('.publishPostMiddel textarea').css('overflow','hidden');
  $('.publishPostMiddel textarea').blur();
  $('.publishPostContainer .publishPostTop .closeBtn').hide(500);
  $('.publishPostMiddel span').hide(500);
  $('.publishPostBottom').hide(500);
  makePostModeON = false;
  enableScroll();
}
$('.publishPostContainer .publishPostTop .closeBtn').click(closePublishPost);
$('#uploadFile').change(function() {
  var file = this.files[0];
  $('#filesName').html("");
  if (file) {
    $('.publishPostBottom button').attr('disabled', false);
    for (var i = 0; i < this.files.length; i++) {
      file = this.files[i];
      $('#filesName').append(file.name);
      $('#filesName').append('<br>');
    }
  }else if (!$('.publishPostMiddel textarea').val()) {
    $('.publishPostBottom button').attr('disabled', true);
  }
});
function openEditPost(postId) {
  editPost = true;
  postID = postId;
  $('.fullScreen').removeClass('exitPostMenu');
  $('.fullScreen').addClass('open');
  $('.editPostMiddel textarea').val($('#'+postId + 'TXT').html().replace('<br>', '\n'));
  $('button[name="EditPost"]').val(postId);
  $('#'+postId+'M').hide(500);
  $('.editPostContainer').show(500);
  disableScroll();
}
function closeEditPost() {
  editPost = false;
  $('.fullScreen').removeClass('open');
  $('.editPostContainer').hide(500);
  enableScroll();
}
