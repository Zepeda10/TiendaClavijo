<?php 

    class HomeModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function buscaProducto(string $producto){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado, p.imagen, f.nombre as 'fam' FROM Productos p inner join Familias f on p.id_familia = f.id WHERE p.nombre LIKE '%".$producto."%' ";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }


        public function getProductos(){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado, p.imagen, f.nombre as 'fam' FROM Productos p inner join Familias f on p.id_familia = f.id";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getFamilias(){
            $query = "SELECT * FROM familias";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getProducto(int $id){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado, p.imagen, f.nombre as 'fam' FROM Productos p inner join Familias f on p.id_familia = f.id WHERE p.id = $id";
            $request = $this->select($query);
  
            return $request; //Retorna la consulta hecha en la clase SqlServer  
        }

        public function addProductoTemporal(string $folio, string $barras, string $producto, int $cantidad, float $precio, float $subtotal, string $imagen, int $id){
            $query = "INSERT INTO tempweb_ventas(folio,cod_barras, producto, cantidad, precio, subtotal, imagen, id_producto) VALUES ('".$folio."', '".$barras."', '".$producto."', ".$cantidad.", ".$precio.", ".$subtotal.", '".$imagen."', ".$id.")";
            
            $request = $this->insert($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        //Comprobando si ya existe un producto escaneado, para solo cambiar su cantidad
        public function porIdCompra($idProducto){
            $query = "SELECT * FROM tempweb_ventas WHERE id_producto = ".$idProducto;
            $request = $this->select($query);

            return $request;
        }

        public function actualizaProductoVenta($idProducto,$cantidad,$subtotal){
            $query = "UPDATE tempweb_ventas SET cantidad = ".$cantidad." , subtotal = ".$subtotal." WHERE id_producto = ".$idProducto;
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function todoTemporal(){
            $query = "SELECT * FROM tempweb_ventas ";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function eliminaProductoVenta($id){
            $query = "DELETE FROM tempweb_ventas WHERE id_producto = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function cuentaTemporal(){
            $query = "SELECT SUM(cantidad) as 'num' FROM tempweb_ventas";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function lastInsertId(){
            $query = "SELECT TOP 1 id FROM web_ventas ORDER BY id DESC";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function addVentas($folio,$idCliente,$total){
            $query = "INSERT INTO web_ventas (folio,total,id_cliente) VALUES ('$folio' , '$total' , '$idCliente' )";

		    $request = $this->insert($query);

		    return $this->lastInsertId();//Retorna el ID de la consulta insertada
        }

        public function insertaProdVendido($folio,$idProducto,$nombre,$cantidad,$precio){
            $query = "INSERT INTO web_detalleventas (id_venta,id_producto,producto,cantidad, precio) VALUES ('$folio' , '$idProducto' , '$nombre' , '$cantidad' , '$precio' )";
    
            $request = $this->insert($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function actualizaStock($idProducto, $cantidad){ 
            $query = " UPDATE Productos SET stock = stock - $cantidad WHERE id = '$idProducto' ";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }
    
        public function eliminaProdTemp(){
            $query = "DELETE FROM tempweb_ventas";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function compruebaTarjeta(string $numero, string $clave, string $nombre, string $fecha){
            $query = "SELECT * FROM tarjetas WHERE numero = '".$numero."' AND clave = '".$clave."' AND nombre = '".$nombre."' AND fecha = '".$fecha."' ";
            $request = $this->select($query);

            return $request;
        }

        public function getInfoCliente(int $id){
            $query = "SELECT * FROM usuarios WHERE id = ".$id;
            $request = $this->select($query);

            return $request;
        }
    

        
    }

?>