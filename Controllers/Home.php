<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

class home extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $data['productos'] = $this->model->getProductos();
        $data['familias'] = $this->model->getFamilias();
        $data['temporal'] = $this->model->todoTemporal();
        $data['total'] =  $this->sumaTotalVentas();
        $data['num'] = $this->numero();
    
        $this->views->getView($this,"Home",$data);
    }

    public function nosotros(){    
        $this->views->getView($this,"Nosotros");
    }


    public function buscar(){
        $producto = $_POST['search-product'];
        $data['familias'] = $this->model->getFamilias();
        $data['temporal'] = $this->model->todoTemporal();
        $data['total'] =  $this->sumaTotalVentas();
        $data['num'] = $this->numero();

        if(isset($producto)){
            $data['productos'] = $this->model->buscaProducto($producto);
        
           
        }
        
         $this->views->getView($this,"Home",$data);

    }

    public function contenidoCarrito($id){
        $data['carrito'] = $this->model->getProducto($id);
        
        while( $row = sqlsrv_fetch_array( $data['carrito'] , SQLSRV_FETCH_ASSOC) ) {
            $res['id'] =  $row['id'];
            $res['cod_barras'] = $row['cod_barras'];
            $res['nombre'] = $row['nombre'];
            $res['fam'] = $row['fam'];
            $res['descripcion'] = $row['descripcion'];
            $res['precio_compra'] = $row['precio_compra'];
            $res['precio_venta'] = $row['precio_venta'];
            $res['stock'] = $row['stock'];
            $res['estado'] = $row['estado']; 
            $res['imagen'] = $row['imagen']; 

            $myJSON = json_encode($res);
        }

        echo $myJSON;
          
    }

    public function insertaTemporal(){ 
        $folio = $_POST['folio_hidden'];
        $barras = $_POST['barras_hidden'];
        $producto = $_POST['nombre_hidden'];
        $cantidad = $_POST['cantidad_hidden'];
        $precio = $_POST['precio_hidden'];
        $subtotal = $_POST['subtotal_hidden'];
        $imagen = $_POST['imagen_hidden'];
        $id = $_POST['idProducto_hidden'];

        $existe = $this->model->porIdCompra($id);
        $row_count = 0;
        $cantActual = 0;
        

        while( $row = sqlsrv_fetch_array( $existe , SQLSRV_FETCH_ASSOC) ) {
            $row_count++;
            $cantActual = $row['cantidad'];
        }

        

        if ($row_count == 0){
            $subtotal = $cantidad * $precio;
            $this->model->addProductoTemporal($folio, $barras, $producto, $cantidad, $precio, $subtotal,$imagen, $id);

        }else if($row_count >= 0){

            $cantidad = $cantActual + $cantidad;
            $subtotal = $cantidad * $precio;


            $this->model->actualizaProductoVenta($id,$cantidad,$subtotal);
        
        } 

        $total =  $this->sumaTotalVentas();
        $this->getDatosCarrito();
            
        header("Location: http://localhost/Tienda/home/home");
    }

    public function sumaTotalVentas(){
		$resultado = $this->model->todoTemporal();

		$total = 0;

        while( $row = sqlsrv_fetch_array( $resultado , SQLSRV_FETCH_ASSOC) ) {
            $total += $row['subtotal'];
        }

		return $total;
	}


    public function getDatosCarrito(){
        $data['productos'] = $this->model->getProductos();
        $data['familias'] = $this->model->getFamilias();
        $data['temporal'] = $this->model->todoTemporal();
        $data['total'] =  $this->sumaTotalVentas();
        $data['num'] = $this->numero();
    
        $this->views->getView($this,"Home",$data);
    }

    public function eliminarProductoCarrito($id){
        $existe = $this->model->porIdCompra($id);

        $cantActual = 0;
        
        while( $row = sqlsrv_fetch_array( $existe , SQLSRV_FETCH_ASSOC) ) {
            $row_count++;
            $cantActual = $row['cantidad'];
            $precio = $row['precio'];;
        }

		if($cantActual >1){
			$cantidad = $cantActual - 1;
			$subtotal = $cantidad * $precio;
			$this->model->actualizaProductoVenta($id,$cantidad,$subtotal);
		}else{
			$this->model->eliminaProductoVenta($id);
		}

	}

    public function numero(){
		$resultado = $this->model->cuentaTemporal();

		$n = 0;

        while( $row = sqlsrv_fetch_array( $resultado , SQLSRV_FETCH_ASSOC) ) {
            $n += $row['num'];
        }

		return $n;
	}

    public function terminarCompra(){
        session_start();//iniciando sesión
		$idCompra = $_POST["folio_h"];
		$idCliente = $_SESSION["id"] ;
		$total = $_POST["total_h"];

        $r_cliente = $this->model->getInfoCliente($idCliente);

        while( $row1 = sqlsrv_fetch_array( $r_cliente , SQLSRV_FETCH_ASSOC) ) {
            $destino = $row1['email'];
            $cliente = $row1['nombre']." ".$row1['apellidos'];
            $dni = $row1['dni'];
        }

		$resultadoId = $this->model->addVentas($idCompra,$idCliente,$total);

        while( $row = sqlsrv_fetch_array( $resultadoId , SQLSRV_FETCH_ASSOC) ) {
            $ide = $row['id'];
        }
			$resultadoCompra = $this->model->todoTemporal();

            while( $row = sqlsrv_fetch_array( $resultadoCompra , SQLSRV_FETCH_ASSOC) ) {
                $this->model->insertaProdVendido($ide,$row['id_producto'],$row['producto'],$row['cantidad'],$row['precio']);

				$this->model->actualizaStock($row['id_producto'], $row['cantidad']);
            }

			$this->model->eliminaProdTemp();

            $this->emailPedido($destino, $cliente,$dni);
            $this->emailPago($destino, $cliente,  $dni);
		

		header("Location: http://localhost/Tienda/home/home");
	}

    public function tarjetas(){
        $numero = $_POST['numero'];
        $clave = $_POST['clave'];
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];

        $row_count = 0;

        $existe = $this->model->compruebaTarjeta($numero,$clave,$nombre,$fecha);

        while( $row = sqlsrv_fetch_array( $existe , SQLSRV_FETCH_ASSOC) ) {
            $row_count++;
        }

        if( $row_count > 0){
            echo "<script>
                        alert('Tarjeta confirmada, puede continuar con su compra.');
                        window.location= '../home/home';
            </script>";
        }else{
            echo "<script>
                        alert('Tarjeta errónea, favor de verificar sus datos.');
                        window.location= '../home/home';
            </script>";
        }


       //header("Location: http://localhost/Tienda/home/home");
    }


    public function emailPedido(string $destino, string $cliente, string $dni){
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
            $mail->addAddress($destino);               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nuevo pedido';
            $mail->Body    = 'El cliente "'.$cliente.'" con DNI "'.$dni.'" ha realizado un nuevo pedido';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
    public function emailPago(string $destino, string $cliente, string $dni){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
            $mail->addAddress($destino);               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nuevo pago';
            $mail->Body    = 'El cliente "'.$cliente.'" con DNI "'.$dni.'" ha realizado un pago';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }



 
}

?>