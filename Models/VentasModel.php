<?php 

    class VentasModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
        }

        public function getVentasFisicas(){
            $query = "SELECT * FROM fisica_ventas ";
    
            $request = $this->select_all($query);

            return $request;
        }

        public function getDetalleFisicas($id){
            $query = "SELECT * FROM fisica_detalleventas WHERE id_venta = ".$id;
    
            $request = $this->select_all($query);

            return $request;
        }

        public function buscaPorCodigo($codigo){
            $query = "SELECT * FROM Productos WHERE cod_barras = '".$codigo."' ";
    
            $request = $this->select($query);

            $res['existe'] = false;
            $res['error'] = '';
            $res['datos'] = '';
                    
            if($request){
                $res['datos'] = $request;
                $res['existe'] = true;
            } else{
                $res['error'] = 'No existe el producto';
                $res['existe'] = false;
            }
    
            return $res;
        }

        public function selectIdProducto($idProducto){
            $query = "SELECT * FROM Productos WHERE id = ".$idProducto;
            $request = $this->select($query);
            return $request;
        }

        public function porIdCompra($idProducto){
            $query = "SELECT * FROM tempfisica_ventas WHERE id_producto = ".$idProducto;
            $request = $this->select($query);
            return $request;
        }

        public function insertaEnTemp($idCompra,$idProducto,$codBarras,$producto,$cantidad,$precio,$subtotal){
            $query = "INSERT INTO tempfisica_ventas (folio,id_producto,cod_barras,producto,cantidad,precio,subtotal) VALUES ('$idCompra' , '$idProducto' , '$codBarras' , '$producto' , '$cantidad' , '$precio' , '$subtotal' )";
    
            $request = $this->insert($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function actualizaProductoVenta($idProducto,$cantidad,$subtotal){
            $query = " UPDATE tempfisica_ventas SET cantidad = ".$cantidad." , subtotal = ".$subtotal." WHERE id_producto = ".$idProducto;
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function eliminaProductoVenta($idProducto){
           $query=" DELETE FROM tempfisica_ventas WHERE id_producto = ".$idProducto;
           $request = $this->delete($query);

           return $request; //Retorna la consulta hecha en la clase SqlServer
        }
    

        public function porFolio(){
            $query = "SELECT * FROM tempfisica_ventas ";
            $request = $this->select_all($query);
            return $request;
        }

        public function lastInsertId(){
            $query = "SELECT TOP 1 id FROM fisica_ventas ORDER BY id DESC";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function insertaProdHist($idCompra,$idUsuario,$total){
            $query = "INSERT INTO fisica_ventas (folio,id_user,total) VALUES ('$idCompra' , '$idUsuario' , '$total' )";
    
            $request = $this->insert($query);

            return $this->lastInsertId();//Retorna el ID de la consulta insertada
        }

        public function insertaProdVendido($idCompra,$idProducto,$nombre,$cantidad,$precio){
            $query = "INSERT INTO fisica_detalleventas (id_venta,id_producto,producto,cantidad, precio) VALUES ('$idCompra' , '$idProducto' , '$nombre' , '$cantidad' , '$precio' )";
    
            $request = $this->insert($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function actualizaStock($idProducto, $cantidad){ 
            $query = " UPDATE Productos SET stock = stock - $cantidad WHERE id = '$idProducto' ";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function eliminaProdTemp(){
            $query = " DELETE FROM tempfisica_ventas ";
            $request = $this->delete($query);

           return $request; //Retorna la consulta hecha en la clase SqlServer
        }
    
    

    
          
    }

?>