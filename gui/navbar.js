const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav-links");
const navLinks = document.querySelectorAll('.nav-links li');
const profileLink = document.getElementById('profileLink');
const navImage = document.getElementById('NavImage');
const navProfileSpan = document.getElementById('NavprofileSpan');
const postIMGs = document.querySelectorAll('.news_feed_description img');
const fullscreenMode = document.querySelector('.fullscreenMode');
const fullscreenButton = document.querySelector('.fullscreenMode i');
const fullscreenIMG = document.querySelector('.fullscreen-img');
const fullscreenTxt = document.querySelector('.fullscreen-caption');
var fullscreenON = false;

// call this to Disable scrolling
function disableScroll() {
  // Get the current page scroll position
  scrollTop = window.pageYOffset;
  scrollLeft = window.pageXOffset;
  window.onscroll = function() {
    window.scrollTo(scrollLeft, scrollTop);
  };
}
// call this to Enable scrolling
function enableScroll() {
  window.onscroll = function() {};
}
//profile link at the nav image show and hide
function windowResizing (){
  var vw = window.innerWidth;
  if ((navProfileSpan.innerText.length > 8) && (vw > 768)){
    var minwidth = (navProfileSpan.innerText.length)*10;
    profileLink.style.minWidth = minwidth+'px';
    navImage.style.display = 'none';
  }else if ((navProfileSpan.innerText.length > 8) && (vw < 768)) {
    navImage.style.display = 'block';
  }
}
//call the function
window.onload = windowResizing;
window.onresize = windowResizing;
//hamburger event and animation
hamburger.addEventListener("click", () =>{
  //nav open and close
  nav.classList.toggle("open");
  //links open and close
  navLinks.forEach(link => {
    link.classList.toggle("fade");
  });
  //animate navLinks
  navLinks.forEach((link, index) =>{
    if (link.style.animation){
      link.style.animation = '';
    }else {
      link.style.transition = `all 0.5s ease ${index/5+.5}s`;
    }
  });
  //burger animation
  hamburger.classList.toggle('toggol');
});
function openPostIMGs (){
  //open fullscreen
  fullscreenMode.classList.toggle('open');
  //show the img
  fullscreenIMG.classList.toggle('open');
  disableScroll();
  fullscreenON = true;
}
function closePostIMGs (){
  fullscreenMode.classList.toggle('open');
  fullscreenIMG.classList.toggle('open');
  enableScroll();
  fullscreenON = false;
}
//image at the post to open full screen mode
postIMGs.forEach(img => {
  img.addEventListener('click', ()=>{
    openPostIMGs();
    //change the src of the img
    fullscreenIMG.src = img.getAttribute('src');
  });
});
//close full screen mode
fullscreenMode.addEventListener('click', (e)=>{
  if (e.target.classList.contains('fullscreenMode')){
    closePostIMGs();
  }
});
document.onkeydown = function(evt) {
  evt = evt || window.event;
  if (evt.keyCode == 27) {
    if (fullscreenON) {
      closePostIMGs ();
    }
    if (makePostModeON) {
      closeMakePostMode();
    }
  }
};
fullscreenButton.addEventListener('click', closePostIMGs);
