<?php $root = $_SERVER['DOCUMENT_ROOT']; include $root."/php/models/db.php"; include $root."/assets/fpdf/fpdf.php";
$nro = $_GET['nro'];
global $mysqli;

$result = $mysqli->query("SELECT * FROM pedido WHERE id=$nro");
$dtpedido = $result->fetch_assoc();
$idcliente = $dtpedido['cliente_id'];
$result = $mysqli->query("SELECT * FROM cliente WHERE id=$idcliente");
$dtcliente = $result->fetch_assoc();
$result1 = $mysqli->query("SELECT * FROM detalle_pedido WHERE pedido_id=$nro");
$descuento = 0;
$total=0;
class PDF extends FPDF
{

}

//ENCABEZADO

$pdf = new PDF('P','mm','Letter');
$pdf->SetAutoPageBreak(true,8); 
$pdf->AddPage('P',array(80,240));

//BODY
    //DATOS DEL EQUIPO (TITULO)
$pdf->AddFont('SFPRODISPLAYREGULAR');
$pdf->AddFont('SFPRODISPLAYBLACK');
$pdf->SetMargins(5, 0, 5);
$pdf->Ln();

$nro=$_GET['nro'];
//------DATOS DEL LOCAL------
$pdf->Image($root.'/assets/img/logo.png',30,7,20);

$pdf->Ln(20);

$pdf->SetFont('SFPRODISPLAYBLACK','',14);
$pdf->Cell(70,4,utf8_decode('HellBurger'),0,0,'C',FALSE);
$pdf->Ln(8);

$pdf->SetFont('SFPRODISPLAYBLACK','',10);
$pdf->Cell(70,4,utf8_decode('CASA MATRIZ'),0,0,'C',FALSE);
$pdf->Ln(6);

$pdf->MultiCell(70,4,utf8_decode('Av. Santa Cruz #550,
 entre Av. Melchor Pinto y Brasil '),0,'C',FALSE);
$pdf->Ln(2);

$pdf->Cell(70,4,utf8_decode('Teléfono: 31548659'),0,0,'C',FALSE);
$pdf->Ln();

$pdf->Cell(70,4,utf8_decode('Warnes - Bolivia'),0,0,'C',FALSE);
$pdf->Ln(12);


//-----DATOS FACTURACION-----
$pdf->SetFont('SFPRODISPLAYBLACK','',11);
$pdf->Cell(70,4,utf8_decode('FACTURA'),0,0,'C',FALSE);
$pdf->Ln(1);

$pdf->SetFont('SFPRODISPLAYREGULAR','',8);
$pdf->Cell(70,7,utf8_decode('__________________________________________________________________'),0,0,'C',FALSE);
$pdf->Ln();
    
$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(35,4,utf8_decode('NIT:'),0,0,'R',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(35,4,'176592023',0,0,'L',FALSE);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(35,4,utf8_decode('Autorización:'),0,0,'R',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(35,4,'268401200116435',0,0,'L',FALSE);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(35,4,utf8_decode('Factura Nro.:'),0,0,'R',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(35,4,'00'.$nro,0,0,'L',FALSE);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(35,4,utf8_decode('Fecha emisión:'),0,0,'R',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(35,4,date("d/m/Y", strtotime(substr($dtpedido['date'], 0, 10))),0,0,'L',FALSE);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(35,4,utf8_decode('Hora:'),0,0,'R',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(35,4,date("H:i a", strtotime(substr($dtpedido['date'], 12))),0,0,'L',FALSE);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYREGULAR','',8);
$pdf->Cell(70,0,utf8_decode('__________________________________________________________________'),0,0,'C',FALSE);
$pdf->SetMargins(4, 0, 4);
$pdf->Ln(3);

//-----DATOS CLIENTE-----


$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(36,4,utf8_decode('Nombre/Razón Social:'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(38,4,$dtcliente['name'],0,0,'L',FALSE);
$pdf->Ln(5);

$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(36,4,utf8_decode('NIT/CI/CEX:'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(38,4,$dtcliente['ci'],0,0,'L',FALSE);
$pdf->SetMargins(5, 0, 5);
$pdf->Ln();


//-----DETALLE FACTURA-----
$pdf->SetFont('SFPRODISPLAYREGULAR','',8);
$pdf->Cell(70,0,utf8_decode('__________________________________________________________________'),0,0,'C',FALSE);
$pdf->SetMargins(4, 0, 4);
$pdf->Ln(2);

$pdf->SetFont('SFPRODISPLAYBLACK','',10);
$pdf->Cell(30,6,utf8_decode('Descripción'),0,0,'L',FALSE);
$pdf->Cell(14,6,utf8_decode('Unit.'),0,0,'R',FALSE);
$pdf->Cell(14,6,utf8_decode('Cant.'),0,0,'R',FALSE);
$pdf->Cell(16,6,utf8_decode('Importe'),0,0,'R',FALSE);
$pdf->SetMargins(5, 0, 5);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYREGULAR','',8);
$pdf->Cell(70,0,utf8_decode('__________________________________________________________________'),0,0,'C',FALSE);
$pdf->SetMargins(4, 0, 4);
$pdf->Ln(3);

$pdf->SetFont('SFPRODISPLAYREGULAR','',10);

while ($dtdpedido = $result1->fetch_assoc()) {
    $idproduct = $dtdpedido['producto_id'];
    $result = $mysqli->query("SELECT * FROM producto WHERE id=$idproduct");
    $dtproducto = $result->fetch_assoc();
    $pdf->Cell(29,6,utf8_decode($dtproducto['name']),0,0,'L',FALSE);
    $pdf->Cell(14,6,utf8_decode(number_format($dtproducto['price'], 2, '.', ' ')),0,0,'R',FALSE);
    $pdf->Cell(14,6,utf8_decode($dtdpedido['quantity']),0,0,'R',FALSE);
    $pdf->Cell(17,6,utf8_decode($subtotal = number_format($dtproducto['price']*$dtdpedido['quantity'], 2, '.', ' ')),0,0,'R',FALSE);
    $pdf->Ln();
    $total= number_format($total + $subtotal, 2, '.', ' ');
}

//------TOTALES------
$pdf->SetFont('SFPRODISPLAYREGULAR','',8);
$pdf->Cell(70,0,utf8_decode('__________________________________________________________________'),0,0,'C',FALSE);
$pdf->SetMargins(4, 0, 4);
$pdf->Ln(2);

$pdf->SetFont('SFPRODISPLAYBLACK','',10);
$pdf->Cell(35,6,utf8_decode('Subtotal'),0,0,'L',FALSE);
$pdf->Cell(15,6,utf8_decode('Bs.'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',10);
$pdf->Cell(24,6,utf8_decode($total),0,0,'R',FALSE);
$pdf->Ln(4);

$pdf->SetFont('SFPRODISPLAYBLACK','',10);
$pdf->Cell(35,6,utf8_decode('Descuento'),0,0,'L',FALSE);
$pdf->Cell(15,6,utf8_decode('Bs.'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',10);
$pdf->Cell(24,6,utf8_decode(number_format($descuento, 2, '.', ' ')),0,0,'R',FALSE);
$pdf->SetMargins(5, 0, 5);
$pdf->Ln();

$pdf->SetFont('SFPRODISPLAYREGULAR','',8);
$pdf->Cell(70,0,utf8_decode('__________________________________________________________________'),0,0,'C',FALSE);
$pdf->SetMargins(4, 0, 4);
$pdf->Ln(2);

$pdf->SetFont('SFPRODISPLAYBLACK','',10);
$pdf->Cell(35,6,utf8_decode('TOTAL  FACTURA'),0,0,'L',FALSE);
$pdf->Cell(15,6,utf8_decode('Bs.'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',10);
$pdf->Cell(24,6,utf8_decode(number_format($total-$descuento, 2, '.', ' ')),0,0,'R',FALSE);
$pdf->Ln(10);


//------DETALLES EXTRAS------
$pdf->SetFont('SFPRODISPLAYBLACK','',9);
$pdf->Cell(37,6,utf8_decode('CODIGO DE CONTROL:'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->Cell(37,6,utf8_decode('9F-9E-DA-20'),0,0,'L',FALSE);
$pdf->Ln(10);

$pdf->SetFont('SFPRODISPLAYBLACK','',10);
$pdf->Cell(50,6,utf8_decode('FECHA LIMITE DE EMISION:'),0,0,'L',FALSE);
$pdf->SetFont('SFPRODISPLAYREGULAR','',10);
$pdf->Cell(27,6,utf8_decode('01/04/2023'),0,0,'L',FALSE);
$pdf->Ln(7);

$pdf->Cell(74,16,'',1,0,'C',FALSE);
$pdf->Ln(2);
$pdf->SetFont('SFPRODISPLAYREGULAR','',9);
$pdf->MultiCell(74,4,utf8_decode('ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS. EL USO ILICITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LEY.'),0,'C',FALSE);
$pdf->Ln();








//PRINT
$pdf->Output('Pedido.pdf','I');
/*
$this->SetY( -15 ); 


$this->SetFont( 'Arial', '', 10 ); 

$this->Cell(0,10,'Left text',0,0,'L');

$this->Cell(0,10,'Center text:',0,0,'C');

$this->Cell( 0, 10, 'Right text', 0, 0, 'R' ); 
*/
?>
