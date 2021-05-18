<?php 

    class ProductosModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getProductos(){
            $query = "SELECT p.id, p.cod_barras, p.nombre, p.descripcion, p.precio_compra, p.precio_venta, p.stock, p.estado, u.apellidos FROM Productos p inner join usuarios u ON p.id_proveedor = u.id";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

       
       
     
        
    }

?>