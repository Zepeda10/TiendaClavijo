<?php 

class ventas extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function ventas(){
        $this->views->getView($this,"ventas");
    }

    public function ver_ventas(){
        $data = $this->model->getVentasFisicas();
        $this->views->getView($this,"ver_ventas",$data);
    }

    public function ver_detalles($id){
        $data = $this->model->getDetalleFisicas($id);
        $this->views->getView($this,"ver_detalleventas",$data);
    }

    public function cerrar(){
        $this->model->cerrarSesion();
        header("Location: ../");
    }

    public function buscarPorCodigo($codigo){
        $data = $this->model->buscaPorCodigo($codigo);
        $row_count = 0;
        $res['error'] = "";
        
        while( $row = sqlsrv_fetch_array( $data['datos'], SQLSRV_FETCH_ASSOC) ) {
            $res['id'] =  $row['id'];
            $res['cod_barras'] = $row['cod_barras'];
            $res['nombre'] = $row['nombre'];
            $res['precio_venta'] = $row['precio_venta'];
            $row_count++;

            $myJSON = json_encode($res);
        }

        if($row_count==0){
            $res['error'] = "No existe ese producto";
        }

        $myJSON = json_encode($res);

        echo $myJSON;
    }

    public function insertaProdTemp($datos){
        $porciones = explode(",", $datos);
        $idProducto = $porciones[0]; // porción1
        $cantidad = $porciones[1]; // porción2
        $idCompra = $porciones[2]; // porción3

		$error='';
        $count = 0;
        $count2 = 0;
        $cantActual = 0;
        $precio = 0;
        $codBarras="";
        $nombre ="";


		$producto = $this->model->selectIdProducto($idProducto);

        while( $row = sqlsrv_fetch_array( $producto, SQLSRV_FETCH_ASSOC) ) {
            $count++;
            $precio = $row['precio_venta'];
            $codBarras = $row['cod_barras'];
            $nombre = $row['nombre'];
        }
        
		if($count!=0){
			$datosExiste = $this->model->porIdCompra($idProducto);

            while( $row = sqlsrv_fetch_array( $datosExiste, SQLSRV_FETCH_ASSOC) ) {
                $count2++;
                $cantActual = $row['cantidad'];
                $precio = $row['precio'];
            }

			if($count2!=0){
				$cantidad = $cantActual + $cantidad;
				$subtotal = $cantidad * $precio;
				$this->model->actualizaProductoVenta($idProducto,$cantidad,$subtotal);

			}else{
				$subtotal = $cantidad * $precio;

				$this->model->insertaEnTemp($idCompra,$idProducto,$codBarras,$nombre,$cantidad,$precio,$subtotal);
			}
		}else{
			$error = "No existe el producto";
		}

		$res['info'] = $this->muestraTablaVentas();
		$res['total'] = $this->sumaTotalVentas();

        $myJson = json_encode($res);
        echo $myJson;
	}

    public function muestraTablaVentas(){
		$resultado = $this->model->porFolio();

		$fila='';
		$numFila = 0;

        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {
			$numFila++;
			$fila.= "<tr id = 'fila".$numFila."'>";

			$fila.= "<td>".$numFila."</td>";
			$fila.= "<td>".$row['cod_barras']."</td>";
			$fila.= "<td>".$row['producto']."</td>";
			$fila.= "<td>".$row['cantidad']."</td>";
			$fila.= "<td>".$row['precio']."</td>";
			$fila.= "<td>".$row['subtotal']."</td>";
			$fila.= "<td> <a onclick=\"eliminarProducto(".$row['id_producto']." )\" class='borrar' >Eliminar</a> </td>";
 
			$fila.= "</tr>";
		}

		return $fila;
	}

    public function sumaTotalVentas(){
		$resultado = $this->model->porFolio();

		$total = 0;

        while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {
            $total+=$row['subtotal'];
        }

		return $total;
	}

    public function eliminarProdVenta($idProducto){
		$datosExiste = $this->model->porIdCompra($idProducto);
        $count3 = 0;
        $cantidad = 0;
        $subtotal = 0;

        while( $row = sqlsrv_fetch_array( $datosExiste, SQLSRV_FETCH_ASSOC) ) {
            $count3++;
            $cantActual = $row['cantidad'];
            $precio = $row['precio'];
        }


			if($count3 != 0 ){
				if($cantActual >1){
					$cantidad = $cantActual - 1;
					$subtotal = $cantidad * $precio;
                    $this->model->actualizaProductoVenta($idProducto,$cantidad,$subtotal);
				}else{
                    $this->model->eliminaProductoVenta($idProducto);
				}

			}

		$res['info'] = $this->muestraTablaVentas();
		$res['total'] = $this->sumaTotalVentas();
		$res['error'] = '';
        $myJSon = json_encode($res);
        echo $myJSon;
	}

    public function terminarCompra(){
        session_start();
		$idCompra = $_POST["id_compra"];
		$idUsuario = $_SESSION["id"];
		$total = $_POST["total"];
        $id_venta = 0;


		$resultadoId = $this->model->insertaProdHist($idCompra,$idUsuario,$total);

	
			$resultadoCompra = $this->model->porFolio();

            while( $row = sqlsrv_fetch_array( $resultadoId, SQLSRV_FETCH_ASSOC) ) {
                $id_venta = $row['id'];
            }

            while( $row = sqlsrv_fetch_array( $resultadoCompra, SQLSRV_FETCH_ASSOC) ) {
				$this->model->insertaProdVendido($id_venta,$row['id_producto'],$row['producto'],$row['cantidad'],$row['precio']);

				$this->model->actualizaStock($row['id_producto'], $row['cantidad']);
			}

			$this->model->eliminaProdTemp();

		

	    header("Location: http://localhost/Tienda/ventas/ventas");
	}



  
}

?>