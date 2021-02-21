function closeFullScreen() {
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
  }else if (editProfileMenu) {
    closeEditProfileMenu();
  }else if (editTraineePaying) {
    closeEditTraineePayDate();
  }
}
document.onkeydown = function(evt) {
  evt = evt || window.event;
  if (evt.keyCode == 27) {
    closeFullScreen();
  }
};
$('.fullScreen').click((e)=>{
  if(e.target.classList.contains('fullScreen')){
    closeFullScreen();
  }
});
