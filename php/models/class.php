<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php";

    function selectProduct($product){
        global $mysqli;
        $result = $mysqli->query("SELECT P.id,P.name,P.price FROM producto P WHERE P.category='$product'");
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
                                <span class="b-'.$id.'">0</span>
                            </div>
                            
                            <div class="title">
                                <h3>'.$name.'</h3>
                                <p>'.$price.'</p>
                            </div>
                            <div class="actions">
                                <span class="dec btn-action">-</span>
                                <input type="text" name="qty" id="b-'.$id.'" value="0" hidden>
                                <span class="inc btn-action">+</span>
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
?>