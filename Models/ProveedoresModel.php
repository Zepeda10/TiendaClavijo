<?php 

    class ProveedoresModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getUsers(){
            $query = "SELECT * FROM Usuarios WHERE id_rol = 6";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }
      

     
        
    }

?>