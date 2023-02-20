// SWITCH THEME
var toggle = document.getElementById("theme-switch")
var storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: light)").matches ? "dark" : "light");
if (storedTheme)
    document.documentElement.setAttribute('data-theme', storedTheme)

toggle.onclick = function() {
    var currentTheme = document.documentElement.getAttribute("data-theme");
    var targetTheme = "light";

    if (currentTheme === "light") {
        targetTheme = "dark";
    }

    document.documentElement.setAttribute('data-theme', targetTheme)
    localStorage.setItem('theme', targetTheme);
};

// FIXED NAVBAR
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}


// CAR
document.getElementById("sidenav").style.right = "-100vw";
function openNav() {
    document.getElementById("sidenav").style.right = "0";
    document.getElementById("sidenav").style.width = "100vw";
}
function closeNav() {
    document.getElementById("sidenav").style.right = "-100vw";
}
// var cart = [];
// function displayCart(a) {
//     let j = 0
//     if (cart.length==0) {
//         document.getElementsByClassName('card').innerHTML = "Cart Epty"
//     } else {
//         document.getElementsByClassName('card').innerHTML = cart.map((items)=>{
//         var {image,title,price} = items;
//         return(
//             "a"
//         )
//     }}
    
// }