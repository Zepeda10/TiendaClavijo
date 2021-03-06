<?php 

    class ClientesModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

       
        public function getUser(int $id){
            $query = "SELECT * FROM Usuarios WHERE id = $id";
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getUsers(){
            $query = "SELECT * FROM Usuarios WHERE id_rol = 2";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function addCliente(string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass){
            $query = "INSERT INTO usuarios(nombre,apellidos,dni,celular,direccion,email,pass,id_rol) values('".$nombre."', '".$apellidos."', '".$dni."', '".$celular."', '".$direccion."', '".$email."', '".$pass."', 2)";
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer

        }

        public function deleteCliente(int $id){
            $query = "DELETE FROM usuarios WHERE id = ".$id;
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateCliente(int $id, string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass){
            $query = "UPDATE usuarios SET nombre = '".$nombre."' , apellidos = '".$apellidos."' , dni = '".$dni."', celular = '".$celular."', direccion = '".$direccion."', email = '".$email."', pass = '".$pass."' WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }











        public function setUser(string $p1,string $p2,string $p3,string $p4,string $p5, int $r){
            $query = "INSERT INTO empleados(usuario,nombre,apellidos,email,pass,id_rol) values('".$p1."', '".$p2."', '".$p3."', '".$p4."', '".$p5."', ".$r.")";
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateUser(string $p1,string $p2, int $id){
            $query = "UPDATE empleados SET nombre = '".$p1."' , usuario = '".$p2."' WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

     
     
        
    }

?>