<?php 

class productos extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function productos(){
        $data = $this->model->getProductos();
        $this->views->getView($this,"Productos",$data);

        while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC) ) {
            if($row['stock'] <= 0){
                $this->model->updateStatus($row['id']);

            }
        }    
    }

    public function muestraAgregar(){
        $data['fam'] = $this->model->getFamilias();
        $data['prov']  = $this->model->getProveedores();
        $this->views->getView($this,"add_productos",$data);
    }

    public function agregar(){
        //comprobando que la imagen se suba correctamente, o mande el error
		if($_FILES['imagen']['error']){

			switch($_FILES['imagen']['error']){//los errores en el $_FILES[] pueden tener valores numéricos o asociativos, consultarlos en internet para verlos
				case 1:
			$_SESSION["mensaje"]="La imagen excede los 2MB";
			$_SESSION["mensaje_type"]="danger"; //pintando de verda (bootstrap) el mensaje
			//header("Location: ../vista/Formulario2.php");//redireccionando
			die("<br>No se ha subido el contenido.");
			break;
				case 2:
					echo "El fichero subido excede los 2MB";
					die("<br>No se ha subido el contenido.");
					break;
				case 3:
					echo "El envío del fichero se interrumpió";
					die("<br>No se ha subido el contenido.");
					break;
				
					
			}
			
		}else{
			echo "Fichero subido correctamente <br>";

			//moviendo imagen subida, al directorio de imagen
			if(isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK)){

				$destinoRuta = "imagenes_subidas/";
																				//el nombre de la img en la DB
				move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoRuta.$_FILES['imagen']['name']);//mover archivo del directorio temporal a la carpeta imagenes

				echo "El archivo ".$_FILES['imagen']['name']. " se ha copiado en el directorio de imágenes <br>";
			}else{
				echo "El archivo no se ha podido copiar al directorio de imagen <br>";
			}
		}

        $cod_barras = $_POST['cod_barras'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio_compra = $_POST['precio_compra'];
        $precio_venta = $_POST['precio_venta'];
        $stock = $_POST['stock'];
        $estado = $_POST['estado'];
        $id_prov = $_POST['id_proveedor'];
        $id_fam = $_POST['id_familia'];
        $imagen = $_FILES['imagen']['name'];



        $this->model->addProducto($cod_barras,$nombre,$descripcion,$precio_compra,$precio_venta,$stock,$estado,$id_prov,$id_fam,$imagen);

        header("Location: http://localhost/Tienda/productos/productos");
    }

	public function editar($id){
		$data['fam'] = $this->model->getFamilias();
        $data['prov']  = $this->model->getProveedores();
        $data['producto'] = $this->model->getProducto($id);
        $this->views->getView($this,"editar_producto",$data);
		
    }

    public function update(){
        $id = $_POST['id'];
        $cod_barras = $_POST['cod_barras'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio_compra = $_POST['precio_compra'];
        $precio_venta = $_POST['precio_venta'];
        $stock = $_POST['stock'];
        $estado = $_POST['estado'];
        $id_prov = $_POST['id_proveedor'];
        $id_fam = $_POST['id_familia'];

        $this->model->updateProducto($id,$cod_barras,$nombre,$descripcion,$precio_compra,$precio_venta,$stock,$estado,$id_prov,$id_fam);

        header("Location: http://localhost/Tienda/productos/productos");
    }

	public function eliminar($id){
        $this->model->deleteProducto($id);
		header("Location: http://localhost/Tienda/productos/productos");
    }

    public function stock(){
        $data = $this->model->getProductosSinStock();
        $this->views->getView($this,"ProductosStock",$data);
    }

    public function surtir($id){
        $data = $this->model->getProducto($id);
        $this->views->getView($this,"surtir_producto",$data);
    }

    public function updateSurtir(){
        $id = $_POST['id'];
        $stock = $_POST['stock'];
        $this->model->surtirStock($id,$stock);

        if($stock > 0){
            $this->model->updateCeroStock($id);
        }

        header("Location: http://localhost/Tienda/productos/stock");
    }


}

?>