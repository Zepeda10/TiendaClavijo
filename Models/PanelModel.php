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

        public function addFamilia(string $nombre){
            $query = "INSERT INTO Familias(nombre) values('".$nombre."')";
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getFamilia(int $id){
            $query = "SELECT * FROM familias WHERE id=".$id;
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateFamilia(string $nombre,int $id){
            $query = "UPDATE Familias SET nombre = '".$nombre."' WHERE id = ".$id;
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer
        }

        public function deleteFamilia(int $id){
            $query = "DELETE FROM Familias WHERE id = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }
       

      


     
        
    }

?>