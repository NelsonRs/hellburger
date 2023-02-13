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

var incBtn = document.getElementsByClassName('inc');
var decBtn = document.getElementsByClassName('dec');

for (let i = 0; i < incBtn.length; i++) {
    var button = incBtn[i];
    button.addEventListener('click',(e)=>{
        var btnClicked = e.target;
        var input = btnClicked.parentElement.children[1]
        var inputValue = input.value
        var newValue = parseInt(inputValue) + 1
        input.value = newValue
        document.getElementsByClassName((input.id).toString())[0].innerHTML = input.value
    })
}
for (let i = 0; i < decBtn.length; i++) {
    var button = decBtn[i];
    button.addEventListener('click',(e)=>{
        var btnClicked = e.target;
        var input = btnClicked.parentElement.children[1]
        var inputValue = input.value
        var newValue = parseInt(inputValue) - 1
        if (newValue >= 0) {
            input.value = newValue
            document.getElementsByClassName((input.id).toString())[0].innerHTML = input.value
        }
        else{
            input.value = 0
        }
    })
}