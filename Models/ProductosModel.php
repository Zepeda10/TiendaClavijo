<?php 

    class ProductosModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getProductos(){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado, p.imagen, f.nombre as 'fam' , u.apellidos FROM Productos p inner join usuarios u ON p.id_proveedor = u.id inner join Familias f on p.id_familia = f.id";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function addProducto(string $cod_barras, string $nombre, string $descripcion, float $precio_compra, float $precio_venta, int $stock, bool $estado, int $id_prov, int $id_fam, string $imagen = null){
            $query = "INSERT INTO Productos (cod_barras,nombre,descripcion,precio_compra,precio_venta,stock,estado,id_proveedor,id_familia,imagen) VALUES ('".$cod_barras."', '".$nombre."', '".$descripcion."', ".$precio_compra.", ".$precio_venta.", ".$stock.", ".$estado.", ".$id_prov.", ".$id_fam.", '".$imagen."')";
            $request = $this->insert($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getFamilias(){
            $query = "SELECT * FROM familias";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer$query = "SELECT * FROM familias";
            
        }

        public function getProveedores(){
            $query = "SELECT * FROM Usuarios WHERE id_rol = 6";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getProducto(int $id){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado FROM Productos p WHERE id =".$id;
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateProducto(int $id, string $cod_barras, string $nombre, string $descripcion, float $precio_compra, float $precio_venta, int $stock, int $estado, int $id_prov, int $id_fam){
            $query = "UPDATE Productos SET cod_barras = '".$cod_barras."' , nombre = '".$nombre."' , descripcion = '".$descripcion."', precio_compra = ".$precio_compra.", precio_venta = ".$precio_venta.", stock = ".$stock.", estado = ".$estado.", id_proveedor = ".$id_prov.", id_familia = ".$id_fam." WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function deleteProducto(int $id){
            $query = "DELETE FROM Productos WHERE id = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateStatus(int $id){
            $query = "UPDATE Productos SET estado = 0 WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getProductosSinStock(){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado, p.imagen, f.nombre as 'fam' , u.apellidos FROM Productos p inner join usuarios u ON p.id_proveedor = u.id inner join Familias f on p.id_familia = f.id WHERE estado = 0";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function surtirStock(int $id, int $stock){
            $query = "UPDATE Productos SET stock = ".$stock." WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

       public function updateCeroStock(int $id){
            $query = "UPDATE Productos SET estado = 1 WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
       }

       public function addRebastecido(int $id){
            $query = "INSERT INTO Rebastecidos SELECT cod_barras,nombre,descripcion,precio_compra,precio_venta,stock,estado,id_proveedor FROM Productos WHERE id = ".$id;
            $request = $this->insert($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
       }

       public function getRebastecidos(){
        $query = "SELECT * FROM Rebastecidos ";
        $request = $this->select_all($query);

        return $request; //Retorna la consulta hecha en la clase SqlServer
    }
     
        
    }

?>