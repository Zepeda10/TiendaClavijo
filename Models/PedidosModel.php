<?php 

    class PedidosModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getPedidos(){ 
            $query = "SELECT * FROM web_ventas";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }


        public function getPedido(int $id){
            $query = "SELECT * FROM web_ventas WHERE id =".$id;
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }


        public function deletePedido(int $id){
            $query = "DELETE FROM web_ventas WHERE id = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function deletePedidoDentro(int $id){
            $query = "DELETE FROM web_detalleventas WHERE id_venta = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function confirmarPedido(int $id){
            $query = "INSERT INTO pedidos_confirmados SELECT producto,cantidad,precio,id_venta,id_producto FROM web_detalleventas WHERE id_venta = ".$id;
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getConfirmados(){
            $query = "SELECT * FROM pedidos_confirmados";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function eliminaConfirmado(int $id){
            $query = "DELETE FROM pedidos_confirmados WHERE id = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getDetalles(int $id){
            $query = "SELECT * FROM web_detalleventas WHERE id_venta =".$id;
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function eliminaDetalle(int $id){
            $query = "DELETE FROM web_detalleventas WHERE id = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }


       
     
        
    }

?>