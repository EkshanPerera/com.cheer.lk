function closepageloder(){
  $(".pageloader").css({"height": "0px"});
  $(".animation__wobble").css({"display": "none"});
}
function fadepageloder(){
  $(".pageloader").fadeOut();
  $(".animation__wobble").css({"display": "none"});
}
