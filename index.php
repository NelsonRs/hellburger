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
    <main>

      <header>
        <nav>
          <ul>
            <li><a href="#">Logo</a></li>
            <li><i id="theme-switch"></i></li>
            <li><a href="#">Carrito</a></li>
          </ul>
        </nav>
      </header>

      <section class="section-products">
        <header>
          <h2>Hamburguesas</h2>
        </header>
        <div class="group-card">
          <div class="grid-card">
            <div class="card">
              <div class="col-img">
                <img src="/assets/img/products/bacon-king-doble.png">
              </div>
              <div class="col-title">
                <p>XT Steakhouse</p>
              </div>
            </div>
            <div class="card">
              <div class="col-img">
                <img src="/assets/img/products/bacon-king-doble.png">
              </div>
              <div class="col-title">
                <p>XT Steakhouse</p>
              </div>
            </div>
          </div>
        </div>
      </section>   
        
  </main>
  <script src="<?php $root?>assets/js/main.js"></script>
</body>
</html>