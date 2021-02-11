document.onkeydown = function(evt) {
  evt = evt || window.event;
  if (evt.keyCode == 27) {
    if (makePostModeON) {
      closePublishPost();
    }else if (showImage) {
      closeShowImage();
    }else if (postMenu) {
      postMenu = false;
      $('#'+postID+'M').hide(500);
      $('.fullScreen').removeClass('exitPostMenu');
    }else if (editPost) {
      closeEditPost();
    }
  }
};
$('.fullScreen').click((e)=>{
  if((makePostModeON) && e.target.classList.contains('fullScreen')){
    closePublishPost();
  }
  else if((showImage) && e.target.classList.contains('fullScreen')){
    closeShowImage();
  }
  else if((postMenu) && e.target.classList.contains('fullScreen')){
    postMenu = false;
    $('#'+postID+'M').hide(500);
    $('.fullScreen').removeClass('exitPostMenu');
  }
  else if ((editPost) && e.target.classList.contains('fullScreen')) {
    closeEditPost();
  }
});
