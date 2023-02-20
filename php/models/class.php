<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php";

    function printProducts($category){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price,P.category FROM producto P WHERE P.category='$category'");
        $print = "";
        if ($result->num_rows > 0) {
            $print = '';
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $price = $row["price"];
                $print .= '
                        <a href="?" class="card">
                            <div class="col-img">
                                <img src="/assets/img/products/'.$name.'.png">
                            </div>
                            <div class="col-title">
                                <p>'.$name.'</p>
                                <p>'.$price.'</p>
                            </div>
                        </a>
                    ';
            }
        } else {
            $print = "<p>No hay stock de productos</p>";
            return $print;
        }
        return $print;
    }

    function printCart(){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price FROM producto P");
        $print = "";
        if ($result->num_rows > 0) {
            $print = '<h3 id="Order">Nuevo Pedido</h3>';
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $price = $row["price"];
                $print .= '
                <div class="item Product'.$id.'"">
                    <div class="img">
                        <img src="/assets/img/products/'.$name.'.png">
                    </div>
                    <div class="details">
                        <div class="title">
                            <h3>'.$name.'</h3>
                            <p id=price'.$id.'>'.floatval("$price").' BS</p>
                        </div>
                        <div class="Quantity">
                            <span id="'.$id.'"  onclick="this.parentNode.querySelector('."'input[id=qty".$id."]'".').stepDown(),total(this.id)"><i class="bi-dash-lg"></i></span>
                                <input id="qty'.$id.'" type="number" min="0" value="1" onkeyup="total('.$id.')">
                            <span id="'.$id.'"  onclick="this.parentNode.querySelector('."'input[id=qty".$id."]'".').stepUp(),total(this.id)"><i class="bi-plus-lg"></i></span>
                        </div>
                    </div>
                </div>';
            }
            $print .= 
            '<div class="modal-footer">
                <div class="details">
                    <h3>TOTAL</h3>
                    <p id="total"></p>
                </div>
            </div>

            <div class="Add-order">
                <button onclick="newOrder()">Añadir Orden</button>
            </div>';
        }
        return $print;
    }

    

    
?>