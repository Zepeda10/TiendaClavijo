<?php
require('fpdf/fpdf.php');



//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$total = 0;
$number_of_products = 0;

//For each row, add the field to the corresponding column
while( $row = sqlsrv_fetch_array( $data['venta'], SQLSRV_FETCH_ASSOC) )
{
    $code = $row["cantidad"];
    $name = substr($row["producto"],0,20);
    $real_price = $row["precio"];
    $price_to_show = number_format($row["precio"]);

    $column_code = $column_code.$code."\n";
    $column_name = $column_name.$name."\n";
    $column_price = $column_price.$price_to_show."\n";

    //Sum all the Prices (TOTAL)
    $total = $total+$real_price;
    $number_of_products++;
}


while( $row = sqlsrv_fetch_array( $data['cliente'], SQLSRV_FETCH_ASSOC) )
{
    $nombre = $row['nombre']." ".$row['apellidos'];
}


//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
$total = number_format($total);

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,0,'');



$pdf->SetFont('Arial','B',12);
$pdf->Cell(-10,50,'CLIENTE: '.$nombre."                                 Fecha: ".$data['fecha']->format('d/m/Y'));


$pdf->SetFont('Arial','B',16);
$pdf->Cell(55,10,'GRUPO CLAVIJO');

$pdf->SetFont('Arial','B',14);
$pdf->Cell(50,30,'FACTURA DE COMPRA');

//Fields Name position
$Y_Fields_Name_position = 54;
//Table position, under Fields Name
$Y_Table_Position = 60;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(40);
$pdf->Cell(29,6,'CANTIDAD',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'PRODUCTO',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'PRECIO',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(25,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_name,1);
$pdf->SetY($Y_Table_Position);

$pdf->SetX(135);
$pdf->MultiCell(30,6,'$ '.$total,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(40);
    $pdf->MultiCell(125,6,'',1);
    $i = $i +1;
}

//$pdf->Output('D','factura.pdf');
$pdf->Output();
?>