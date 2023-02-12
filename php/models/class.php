<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php";

    function printFoods(){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price,P.category FROM producto P WHERE P.category='Food'");
        $print = "";
        if ($result->num_rows > 0) {
            $print = '';
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $price = $row["price"];
                $print .= '
                        <div class="card card'.$id.' disable-selection">
                            <a id="'.$id.'" class="stretched-link" onclick="addProduct('.$id.')"></a>
                            <div class="card-body">
                                <div class="img">
                                    <img src="/assets/img/products/'.$name.'.png">
                                    <span class="badge">
                                        <span id="num'.$id.'">0</span>
                                    </span>
                                </div>

                                <div class="title">
                                    <h3>'.$name.'</h3>
                                    <p>'.$price.' Bs</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        } else {
            $print = "<p>No hay hamburguesas</p>";
            return $print;
        }
        return $print;
    }

    function printDrinks(){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price,P.category FROM producto P WHERE P.category='Drink'");
        $print = "";
        if ($result->num_rows > 0) {
            $print = '';
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $price = $row["price"];
                $print .= '
                        <div class="card card'.$id.' disable-selection">
                            <a id="'.$id.'" class="stretched-link" onclick="addProduct('.$id.')"></a>
                            <div class="card-body">
                                <div class="img">
                                    <img src="/assets/img/products/'.$name.'.png">
                                    <span class="badge">
                                        <span id="num'.$id.'">0</span>
                                    </span>
                                </div>

                                <div class="title">
                                    <h3>'.$name.'</h3>
                                    <p>'.$price.' Bs</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        } else {
            $print = "<p>No hay hamburguesas</p>";
            return $print;
        }
        return $print;

    }

    function printCart(){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price FROM producto P");
        $print = "";
        if ($result->num_rows > 0) {
            $print = '<h3 id="Order">Orden nro. '.newOrder().'</h3>';
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $price = $row["price"];
                $print .= '
                <div class="item Product'.$id.'" style="display: none;">
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
                                <input id="qty'.$id.'" type="number" min="0" value="1">
                            <span id="'.$id.'"  onclick="this.parentNode.querySelector('."'input[id=qty".$id."]'".').stepUp(),total(this.id)"><i class="bi-plus-lg"></i></span>
                        </div>
                    </div>
                </div>';
            }
            $print .= '
            <div class="modal-footer">
                <div class="details">
                    <h3>TOTAL</h3>
                    <p id="total"></p>
                </div>
            </div>';
        }
        return $print;
    }

    function newOrder(){
        global $mysqli;
            $result = $mysqli->query("SELECT MAX(pedido_id) a FROM detalle_pedido");
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $print = $row['a']+1;
            }
        }
        return $print;
    }

    /*function selectHamburger(){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price FROM producto P");
        $result = printHamburger($result);
        return $result;
    }
    
    function printHamburger($result){
        $print = "";
        if ($result->num_rows > 0) {
            $id=1;
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $price = $row["price"];
                $print .= '
                        <div class="card">
                            <div class="img">
                                <img src="/assets/svg/burger.svg">
                                <span id="num'.$id.'">0</span>
                            </div>
                            
                            <div class="title">
                                <h3>'.$name.'</h3>
                                <p>'.$price.'</p>
                            </div>
                            <div class="actions">
                                <span id="'.$id.'"  onclick="this.parentNode.querySelector('."'input[type=number]'".').stepUp(),total(this)">+</span>
                                <input id="qty'.$id.'" type="number" min="0" value="0" hidden>
                                <span id="'.$id.'" onclick="this.parentNode.querySelector('."'input[type=number]'".').stepDown(),total(this)">-</span>
                            </div>
                        </div>
                    ';
            }
        } else {
            $print = "<p>No hay hamburguesas</p>";
            return $print;
        }
        return $print;
    }*/
?>