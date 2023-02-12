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


function total(id) {
    document.getElementById("num"+id).innerHTML= document.getElementById("qty"+id).value; 
    const qty = [];
    qty[0]=parseInt(document.getElementById("num1").innerHTML);
    qty[1]=parseInt(document.getElementById("num2").innerHTML);
    qty[2]=parseInt(document.getElementById("num3").innerHTML);
    document.getElementById("Qtycart").innerHTML = qty[0]+qty[1]+qty[2]; 

    const price =[];
    price[0]=parseFloat(document.getElementById("num1").innerHTML)*parseFloat(document.getElementById("price1").innerHTML);
    price[1]=parseFloat(document.getElementById("num2").innerHTML)*parseFloat(document.getElementById("price2").innerHTML);
    price[2]=parseFloat(document.getElementById("num3").innerHTML)*parseFloat(document.getElementById("price3").innerHTML);
    document.getElementById("total").innerHTML = price[0]+price[1]+price[2]; 

}

function addProduct(id) {
    document.querySelector(".modal-products").style.display = "none";
    document.querySelector("#Order").style.display = "flex";
    document.querySelector(".Product"+id).style.display = "flex";
    document.querySelector(".modal-footer").style.display = "flex";

    document.getElementById("qty"+id).value=parseInt(document.getElementById("num"+id).innerHTML)+1;
    total(id)
}

function modalCart() {
    document.querySelector("#ModalCart").style.right = "0";
}
