var toggle = document.getElementById("theme-switch");

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

const plus = document.querySelector(".plus"),
minus = document.querySelector(".minus"),
num = document.querySelector(".num");

let a = 0;

plus.addEventListener("click", ()=>{
    a++;
    num.innerText = a;
})

minus.addEventListener("click", ()=>{
   if(a > 1){
    a--;
    num.innerText = a;
    }
})
