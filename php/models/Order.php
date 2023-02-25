<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php"; include $root."/assets/fpdf/fpdf.php";
$nro = $_GET['nro'];
global $mysqli;

$result1 = $mysqli->query("SELECT * FROM detalle_pedido WHERE pedido_id=$nro");

class PDF extends FPDF
{
// Page header


}

//ENCABEZADO

$pdf = new PDF('P','mm','Letter');
$pdf->SetAutoPageBreak(true,8); 
$pdf->AddPage('P',array(80,100));

//BODY
    //DATOS DEL EQUIPO (TITULO)
$pdf->SetMargins(5, 0, 5);
$pdf->Ln();
  
$pdf->SetFont('arial','b',12);
$pdf->Cell(70,4,utf8_decode('Pedido Nro. '.$nro),0,0,'C',FALSE);
$pdf->Ln();

$pdf->SetFont('arial','',10);
$pdf->Cell(70,7,'_________________________________________________',0,0,'C',FALSE);
$pdf->SetMargins(8, 0, 8);
$pdf->Ln();

$pdf->SetFont('arial','b',12);
$pdf->Cell(35,6,utf8_decode('Descripción'),0,0,'L',FALSE);
$pdf->Cell(15,6,'',0,0,'L',FALSE);
$pdf->Cell(15,6,'Cant.',0,0,'C',FALSE);
$pdf->SetMargins(5, 0, 5);
$pdf->Ln();

$pdf->SetFont('arial','',10);
$pdf->Cell(70,0,'_________________________________________________',0,0,'C',FALSE);
$pdf->SetMargins(8, 0, 8);
$pdf->Ln(4);
$pdf->SetFont('arial','',11);

//-----DETALLE-----
while ($dtdpedido = $result1->fetch_assoc()) {
    $idproduct = $dtdpedido['producto_id'];
    $result = $mysqli->query("SELECT * FROM producto WHERE id=$idproduct");
    $dtproducto = $result->fetch_assoc();

$pdf->Cell(35,6,utf8_decode($dtproducto['name']),0,0,'L',FALSE);
$pdf->Cell(15,6,'',0,0,'L',FALSE);
$pdf->Cell(15,6,utf8_decode($dtdpedido['quantity']),0,0,'C',FALSE);
$pdf->Ln();
}
$pdf->SetMargins(5, 0, 5);
$pdf->Ln(1);

$pdf->SetFont('arial','',10);
$pdf->Cell(70,0,'_________________________________________________',0,0,'C',FALSE);
$pdf->Ln(0);


//PRINT
$pdf->Output('Comanda_nro_'.$nro.'.pdf','I');
/*
$this->SetY( -15 ); 


$this->SetFont( 'Arial', '', 10 ); 

$this->Cell(0,10,'Left text',0,0,'L');

$this->Cell(0,10,'Center text:',0,0,'C');

$this->Cell( 0, 10, 'Right text', 0, 0, 'R' ); 
*/
?>
