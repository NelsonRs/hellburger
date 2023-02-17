<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php";

if (isset($_POST['consulta'])) {

    if ($_POST['consulta']=='nroOrder') {
        $total = $_POST['total'];
        global $mysqli;
            $result = $mysqli->query("SELECT MAX(id) a FROM pedido");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nroOrder = $row['a']+1;
        }
        $hoy = date("Y-m-d h:i:s");  
        $mysqli->query("INSERT INTO pedido(id,cliente_id,total) VALUES($nroOrder,2,$total)");
        echo $nroOrder;
    }
}


if (isset($_POST['order'])&&isset($_POST['product'])&&isset($_POST['qty'])) {
    global $mysqli;
    $nroorder = $_POST['order'];
    $product = $_POST['product'];
    $qty = $_POST['qty'];

    $result = $mysqli->query("SELECT * FROM producto WHERE id=$product");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subtotal = $qty * $row['price'];     
    }
    
    $mysqli->query("INSERT INTO detalle_pedido(pedido_id,producto_id,quantity,subtotal) VALUES($nroorder,$product,$qty,$subtotal)");
    echo $nroorder;
}

?>