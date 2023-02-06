<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php";

    function selectHamburger(){
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
    }
?>