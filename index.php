<?php 
    $root = $_SERVER["DOCUMENT_ROOT"]; require_once $root.'/php/models/class.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | HellBurger</title>
    <link rel="shortcut icon" href="/assets/img/favicon.png" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body> 
  <div class="loader">
    <div class="content">
      <div class="image"><img src="assets/img/loader.gif" alt=""></div>
      <div class="text"><span>Loading...</span></div>
    </div>
  </div>
    <main class="section-index">
        <header>
            <div class="social-media">
                <i id="theme-switch" class="bi-moon-fill"></i>
            </div>
            <div class="logo">
                <img src="assets/img/logo.png" alt=""/>
            </div>
            <div id="mostrar-modal" class="btn-cart hamburger" onclick="modalCart()" >
                <div class="bi-cart4">
                    <span id="Qtycart" class="badge">
                        0
                    </span>
                </div>
            </div>
        </header>
        
        <section class="section-Products">
            <h1>Productos</h1>
            <h2>Hamburguesas</h2>
            <div class="products">
            <?=printProducts('Food')?>
            </div>
            <h2>Bebidas</h2>
            <div class="products">
              <?=printProducts('Drink')?>
            </div>
        </section>
        
<div class="modal" id="ModalCart" tabindex="-1" aria-labelledby="ModalCart" aria-hidden="true" data-backdrop="">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close"><i class="bi-x-lg"></i></span>
    </div>

    <div class="modal-body">
      <div class="modal-products">
        <h3>No tiene productos en el carrito!</h3>
      </div>
      <?= printCart()?>
    </div>
  </div>  
</div>

<div id="ModalMessage"  aria-labelledby="ModalMessage" aria-hidden="true" data-backdrop="">
    <div class="modal-content">
      <div class="modal-header">
        <span>Exito!</span>
      </div>
      <div class="modal-body">
        <p>Su pedido se registró correctamente!</p>
      </div>
    </div>
</div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php $root?>assets/js/main.js"></script>
</body>
</html>