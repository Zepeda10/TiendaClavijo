<?php
require('fpdf/fpdf.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

class factura extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function factura($id){

        $idCliente = 0;
        $idVenta = $id;
        $fecha = "";
        $data['venta'] = $this->model->getDetalles($id);

        $result = $this->model->getInfoVenta($idVenta);

        while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ){
            $idCliente = $row['id_cliente'];
            $fecha = $row['fecha'];
        }

        $data['fecha'] = $fecha;

        $data['cliente'] = $this->model->getInfoCliente($idCliente);




        //Initialize the 3 columns and the total
        $column_code = "";
        $column_name = "";
        $column_price = "";
        $total = 0;
        $number_of_products = 0;
        $idVenta = "";
        $email="";

        //For each row, add the field to the corresponding column
        while( $row = sqlsrv_fetch_array( $data['venta'], SQLSRV_FETCH_ASSOC) )
        {
            $code = $row["cantidad"];
            $name = substr($row["producto"],0,20);
            $precio = $row["precio"];

            $column_code = $column_code.$code."\n";
            $column_name = $column_name.$name."\n";
            $column_price = $column_price.$precio."\n";

        }


        while( $row = sqlsrv_fetch_array( $data['cliente'], SQLSRV_FETCH_ASSOC) )
        {
            $nombre = $row['nombre']." ".$row['apellidos'];
            $email =  $row['email'];
        }


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
        $pdf->MultiCell(30,6,'$ '.$column_price,1);

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
        //$pdf->Output();

        //$documento = $pdf->Output('Factura.pdf', 'S');
        $pdf->Output('Ficheros/Factura'.$idVenta.'.pdf', 'F');
        $documento = 'Ficheros/Factura'.$idVenta.'.pdf';
        $this->emailFactura($documento, 'Factura'.$idVenta.'.pdf',$email);


        header("Location: http://localhost/Tienda/pedidos/pedidos");



    }

    public function emailFactura($archivo, $nombre,$email){
        $mail = new PHPMailer(true);
    
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'mailerclavijo@gmail.com';                     //SMTP username
                $mail->Password   = 'tienda12345';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
                //Recipients
                $mail->setFrom('mailerclavijo@gmail.com', 'Mailer');
                $mail->addAddress('mailerclavijo@gmail.com', 'Mailer');     //Add a recipient
                $mail->addAddress($email); 
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
    
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                $mail->addAttachment($archivo, $nombre);    //Optional name
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Factura de pedido';
                $mail->Body    = 'Factura de su pedido.';
    
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }

}

?>