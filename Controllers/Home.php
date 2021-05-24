<?php 

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
		$idCompra = $_POST["folio_h"];
		$idCliente = 2;
		$total = $_POST["total_h"];

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

    




 
}

?>