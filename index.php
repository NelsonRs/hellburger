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
</head>
<body> 
    
    <section class="section-index">
    <button id="theme-switch">Change</button>
        <header>
            <h1>Productos</h1>
        </header>
        <section class="section-hamburguer">
            <header>
                <h2>Hamburguesas</h2>
            </header>
            <?=printProducts()?>
        </section>
    </section>
    <section class="cart">

    </section>
<script src="<?php $root?>assets/js/main.js"></script>
</body>
</html>