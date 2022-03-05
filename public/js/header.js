let headerHr = document.getElementById("header-hr")
let mobileNav = document.getElementById("mobile-nav")
let iconMenu = document.getElementById("menu")
let iconCloseMenu = document.getElementById("close-menu")

iconMenu.addEventListener("click", function () {
  console.log("click");
  mobileNav.classList.remove("translate-x-full");
})
    
iconCloseMenu.addEventListener("click", function () {
  mobileNav.classList.add("translate-x-full");
})
window.onscroll = function(){
    
    headerHr.classList.remove("hidden")
    headerHr.classList.add("block")
}