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
    <button id="theme-switch">Change</button>
    <section class="section-index">
        <header>
            <h1>Productos</h1>
        </header>
        <section class="section-food">
            <header>
                <h2>Burger</h2>
            </header>
            <?=selectProduct('Food')?>
        </section>
        <section class="section-drink">
            <header>
                <h2>Drinks</h2>
            </header>
            <?=selectProduct('Drink')?>
        </section>
    </section>
    <script src="<?php $root?>assets/js/main.js"></script>
</body>
</html>