var postID = null;
var postMenu = false;
var showImage = false;
function openPostMenu(postId) {
  postID = postId;
  postMenu = true;
  $('#'+postId+'M').show(500);
  $('.fullScreen').addClass('exitPostMenu');
}
$('.img-container img').click(function(){
  $(this).addClass('fullmode');
  showImage = true;
  $('.fullScreen').addClass('open');
  disableScroll();
});
$('.img-container video').click(function(){
  showImage = true;
  $(this).addClass('fullmode');
  $(this).attr('controls', 'true');
  $('.fullScreen').addClass('open');
  disableScroll();
});
function closeShowImage() {
  showImage = false;
  $('.fullScreen').removeClass('open');
  $('.img-container img').removeClass('fullmode');
  $('.img-container video').removeClass('fullmode');
  $('.img-container video').removeAttr('controls');
  $('.img-container video').trigger('pause');
  enableScroll();
}
