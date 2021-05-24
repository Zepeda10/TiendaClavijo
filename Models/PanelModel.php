<?php 

    class PanelModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getRoles(){
            $query = "SELECT * FROM roles";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getFamilias(){
            $query = "SELECT * FROM familias";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }


     
        
    }

?>