
<?php


//Incluimos el fichero de conexion
include_once("conexion.php");
//Incluimos la libreria PDF
include_once('fpdf183/fpdf.php');

class PDF extends FPDF
{
// Funcion encargado de realizar el encabezado
function Header()
{
// Logo
$this->Image('logo.png',10,2,30);
$this->SetFont('Arial','B',13);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(90,10,'Contador de Aves - Reporte Extendido',1,0,'C');
// Line break
$this->Ln(20);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'PAGINA '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('valor'=> 'Aves contadas', 'tiempo'=> 'Fecha y hora','lote'=> 'Lote',);

$fecha = $_GET["fechas"] ?? null;

$result = mysqli_query($connString, "SELECT * FROM valores WHERE (DATE(fecha) = '$fecha')") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM valores");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
// Declaramos el ancho de las columnas
$w = array(15, 80, 20, 30,30);
$w = array(15, 80, 20, 30, 40);
//Declaramos el encabezado de la tabla
//$pdf->Cell(15,12,'ID',1);

$pdf->Cell(80,12,'Fecha y Hora',1);
$pdf->Cell(20,12,'Cantidad',1);
$pdf->Cell(30,12,'Lote',1);
$pdf->Cell(50,12,'Patente Transporte',1);
$pdf->Ln();
$pdf->SetFont('Arial','',12);
//Mostramos el contenido de la tabla
foreach($result as $row)
{
//$pdf->Cell($w[0],6,$row['id'],1);

$pdf->Cell($w[1],6,$row['tiempo'],1);
$pdf->Cell($w[2],6,$row['valor'],1);
$pdf->Cell($w[3],6,($row['lote']),1);
$pdf->Cell(50,6,$row['patente'],1);
$pdf->Ln();
}
$pdf->Output();
?>
