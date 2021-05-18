<?php 

    class HomeModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function setUser(string $nombre, int $edad){
            $query = "INSERT INTO persona(nombre,edad) values(?,?)";
            $arrData = array($nombre,$edad);
            $request_insert = $this->insert($query,$arrData);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getUser(int $id){
            $query = "SELECT * FROM persona WHERE id = $id";
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateUser(int $id, string $nombre, int $edad){
            $query = "UPDATE persona SET nombre = ?, edad = ? WHERE id = $id";
            $arrData = array($nombre,$edad);
            $request = $this->update($query,$arrData);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getUsers(){
            $query = "SELECT * FROM persona";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function deleteUser(int $id){
            $query = "DELETE FROM persona WHERE id = $id";
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }
        
    }

?>