<?php 

    class FacturaModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getInfoVenta(int $id){
            $query = "SELECT * FROM web_ventas WHERE id = ".$id;
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getInfoCliente(int $id){
            $query = "SELECT * FROM usuarios WHERE id = ".$id;
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getDetalles(int $id){
            $query = "SELECT * FROM web_detalleventas WHERE id_venta =".$id;
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }
    

        
    }

?>