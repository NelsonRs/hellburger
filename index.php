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
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body> 
    <section class="section-index">
        <header>
            <div class="social-media">
                <i id="theme-switch" class="bi-moon-fill"></i>
            </div>
            <div class="logo">
                <img src="assets/img/products/Burger Doble.png" alt=""/>
            </div>
            <div class="btn-cart">
            <i class="bi-cart4"></i>
            </div>
        </header>
        
        <main class="section-hamburguer">
            <h1>Productos</h1>
            <h2>Hamburguesas</h2>
            <div class="products">
            <?=printProducts()?>
            </div>
        </main>

        <aside id="cart">

        </aside>
        
    </section>

    
<script src="<?php $root?>assets/js/main.js"></script>
</body>
</html>