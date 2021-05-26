<?php 

    class DeliveryModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getUsers(){
            $query = "SELECT * FROM Usuarios WHERE id_rol = 7";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getUser(int $id){
            $query = "SELECT * FROM Usuarios WHERE id = $id";
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function addDelivery(string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass){
            $query = "INSERT INTO usuarios(nombre,apellidos,dni,celular,direccion,email,pass,id_rol) values('".$nombre."', '".$apellidos."', '".$dni."', '".$celular."', '".$direccion."', '".$email."', '".$pass."', 7)";
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer

        }

        public function deleteDelivery(int $id){
            $query = "DELETE FROM usuarios WHERE id = ".$id;
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateDelivery(int $id, string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass){
            $query = "UPDATE usuarios SET nombre = '".$nombre."' , apellidos = '".$apellidos."' , dni = '".$dni."', celular = '".$celular."', direccion = '".$direccion."', email = '".$email."', pass = '".$pass."' WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

       
     
        
    }

?>