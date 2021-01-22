const share_div = document.querySelector(".share");
const fakeMakePostInput = document.querySelector(".share_upSide .input-field input");
const makePostContainer = document.querySelector(".makePostContainer");
const makePost = document.querySelector(".makePost");
const postTXT = document.querySelector(".makePostinput textarea");
const closeMakePostBTN = document.querySelector(".makePostContainer i");
const postBTN = document.querySelector(".share_continar button");
var makePostModeON = false;

function openMakePostMode(){
  makePostModeON = true;
  fakeMakePostInput.blur();
  share_div.style.visibility = "hidden";
  makePostContainer.classList.toggle('open');
  makePost.classList.toggle('open');
  disableScroll();
}
function closeMakePostMode() {
  makePostModeON = false;
  share_div.style.visibility = "visible";
  fakeMakePostInput.value = postTXT.value;
  makePostContainer.classList.toggle('open');
  makePost.classList.toggle('open');
  enableScroll();
}
function enablePostbtn (){
  if(postTXT.value.length <= 0){
    postBTN.disabled = true;
  }else{
    postBTN.disabled = false;
  }
}
fakeMakePostInput.addEventListener('focus', openMakePostMode);
makePostContainer.addEventListener('click', (e)=>{
  if (e.target.classList.contains('makePostContainer')) {
    closeMakePostMode();
  }
});
closeMakePostBTN.addEventListener('click', closeMakePostMode);
postTXT.addEventListener('keyup', enablePostbtn);
