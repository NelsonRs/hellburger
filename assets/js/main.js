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
    var cards = document.getElementsByClassName("card").length;
    
    const price = [cards-1];
    qtyTotal = 0;
    priceTotal = 0;
    for (let i = 0; i < cards; i++) {
        qtyTotal = qtyTotal+ parseInt(document.getElementById("num"+(i+1)).innerHTML);
        price[i]=parseFloat(document.getElementById("num"+(i+1)).innerHTML)*parseFloat(document.getElementById("price"+(i+1)).innerHTML);
    }
    for (let i = 0; i < cards; i++) {
        priceTotal= priceTotal+price[i];
    }
    document.getElementById("Qtycart").innerHTML = qtyTotal; 
    document.getElementById("total").innerHTML = priceTotal+" BS"; 
    
    if ((document.getElementById("qty"+id).value)==0) {
        document.querySelector(".Product"+id).style.display = "none";
        if ((document.getElementById("Qtycart").innerHTML)==0) {
            document.querySelector(".modal-products").style.display = "flex";
            document.querySelector("#Order").style.display = "none";
            document.querySelector(".modal-footer").style.display = "none";
        }
    }
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
