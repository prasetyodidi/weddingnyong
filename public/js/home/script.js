var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    console.log("slide");
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  console.log(n + "n");
  var slider = document.getElementById("my-slider");
  var x = document.getElementsByClassName("my-slides");
  var xItem = x[0].currentStyle || window.getComputedStyle(x[0]);
  var marginX = parseInt(xItem.marginLeft) * 2;
  var translate1 = x[0].offsetWidth + marginX;

  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  if (slideIndex <= x.length) {
    var translate = translate1 * (slideIndex-1);
    slider.style.transform = "translateX(-"+ translate +"px)";
  }
}
