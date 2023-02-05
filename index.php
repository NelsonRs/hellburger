<?php 
    $root = $_SERVER["DOCUMENT_ROOT"]; require_once $root.'/php/models/class.php';
?>
<!DOCTYPE html>
<html lang="en">
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
        <section class="section-hamburguer">
            <header>
                <h2>Hamburguesas</h2>
            </header>
            <?=selectHamburger()?>
        </section>
    </section>
<script src="<?php $root?>assets/js/main.js"></script>
</body>
</html>