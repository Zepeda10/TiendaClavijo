<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


class pedidos extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function pedidos(){
        $data = $this->model->getPedidos();
        $this->views->getView($this,"Pedidos",$data);
    }


    public function confirmados(){
        $data = $this->model->getConfirmados();
        $this->views->getView($this,"Pedidosconfirmados",$data);
    }

    public function detalles($id){
        $data = $this->model->getDetalles($id);
        $this->views->getView($this,"PedidosDetalles",$data);
    }

    
	public function eliminar($id){
        $this->model->deletePedidoDentro($id);
        $this->model->deletePedido($id);
		header("Location: http://localhost/Tienda/pedidos/pedidos");
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
        $this->views->getView($this,"factura",$data);
    }


    public function confirmar($id){
        $this->model->confirmarPedido($id);

        $data = $this->model->getInfoVenta($id);
        while( $row = sqlsrv_fetch_array( $data , SQLSRV_FETCH_ASSOC) ) {
            $folio = $row['folio'];
        }

        $this->emailDespachado($folio);

        //$detalle = $this->model->getDetalles($id);


	    header("Location: http://localhost/Tienda/factura/factura/".$id);
    }

    public function eliminaConf($id){
        $this->model->eliminaConfirmado($id);
        header("Location: http://localhost/Tienda/pedidos/confirmados");
    }

    public function eliminaDetalle($id){
        $this->model->eliminaDetalle($id);
        header("Location: http://localhost/Tienda/pedidos/pedidos");
    }

    public function emailDespachado(string $folio){

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
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
    
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Despacho de pedido';
                $mail->Body    = 'El pedido con folio "'.$folio.'" se ha despachado.';
    
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }
    
    


}

?>