load()

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

var Message = document.querySelector("#ModalMessage");

function newOrder() {
    var total = document.querySelector("#total").innerHTML;

    let ruta = "consulta=nroOrder&total="+parseInt(total);
            $.ajax({
                url:  'php/models/negocio.php',
                type: 'POST',
                data: ruta,
                
            success: function(r) {
                insertOrder(r);
            },
    }); 
}

function insertOrder(order) {
    nroorder = order;
    var cards = document.getElementsByClassName("item").length;
    for (let i = 1; i <= cards; i++) {
        if (document.querySelector(".Product"+(i)).style.display=='flex') {
            qty= document.querySelector("#num"+(i)).innerHTML;
            let ruta = "order="+nroorder+"&product="+(i)+"&qty="+qty;
            $.ajax({
                url:  'php/models/negocio.php',
                type: 'POST',
                data: ruta,
                
                success: function() {
                },
            }); 
        } 
    }
    Message.style.display="flex";
    clearOrder();
    closeCart();
    setTimeout(function(){
        $("#ModalMessage").fadeOut("slow");
        printer(nroorder);
    }, 1100);

}

function printer(nro) {
    window.open("/php/models/Order.php?nro="+nro);
    window.open("/php/models/Factura.php?nro="+nro);
}

function total(id) {
    document.getElementById("num"+id).innerHTML= document.getElementById("qty"+id).value; 
    var cards = document.getElementsByClassName("item").length;
    
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
        if (document.getElementById("Qtycart").innerHTML == 0) {
            clearCart();
        } 
    }
}

function clearOrder() {
    var cards = document.getElementsByClassName("item").length;
    for (let i = 0; i < cards; i++) {
        var item = document.querySelector(".Product"+(i+1));
        document.getElementById("qty"+(i+1)).innerHTML=0;
        document.getElementById("num"+(i+1)).innerHTML=0;
        item.style.display = "none";
    }
    clearCart();
}

function clearCart() {
    document.getElementById("Qtycart").innerHTML = 0;
    document.querySelector(".modal-products").style.display = "flex";
    document.querySelector("#Order").style.display = "none";
    document.querySelector(".Add-order").style.display = "none";
    document.querySelector(".modal-footer").style.display = "none";
}

function addProduct(id) {
    document.querySelector("#Order").style.display = "flex";
    document.querySelector(".modal-products").style.display = "none";
    document.querySelector(".Add-order").style.display = "flex";
    document.querySelector(".Product"+id).style.display = "flex";
    document.querySelector(".modal-footer").style.display = "flex";

    document.getElementById("qty"+id).value=parseInt(document.getElementById("num"+id).innerHTML)+1;
    total(id)
}

function load() {
    $(window).load(function() {
          $(".loader").fadeOut("slow");
    });
}

var span = document.querySelector(".close");

span.onclick = function() {
    closeCart();
}


function closeCart() {
    var modal = document.getElementById("ModalCart");
    modal.style.right="-100vh";
}

function modalCart() {
    document.querySelector("#ModalCart").style.right = "0";
}