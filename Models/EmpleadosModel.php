<?php 

    class EmpleadosModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function getUsers(){
            $query = "SELECT u.id, u.nombre, u.apellidos, u.dni, u.celular, u.direccion, u.email, r.rol FROM Usuarios u inner join roles r ON u.id_rol = r.id WHERE id_rol = 1 OR id_rol = 3 OR id_rol = 4 OR id_rol = 5";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getUser(int $id){
            $query = "SELECT * FROM Usuarios WHERE id = $id";
            $request = $this->select($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function getRoles(){
            $query = "SELECT * FROM roles WHERE id = 1 OR id = 3 OR id = 4 OR id = 5";
            $request = $this->select_all($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer$query = "SELECT * FROM familias";
        }
        
        public function addEmpleado(string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass, int $rol){
            $query = "INSERT INTO usuarios(nombre,apellidos,dni,celular,direccion,email,pass,id_rol) values('".$nombre."', '".$apellidos."', '".$dni."', '".$celular."', '".$direccion."', '".$email."', '".$pass."', ".$rol.")";
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer
            
        }

        public function deleteEmpleado(int $id){
            $query = "DELETE FROM usuarios WHERE id = ".$id;
            $request = $this->delete($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function updateEmpleado(int $id, string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass, int $rol){
            $query = "UPDATE usuarios SET nombre = '".$nombre."' , apellidos = '".$apellidos."' , dni = '".$dni."', celular = '".$celular."', direccion = '".$direccion."', email = '".$email."', pass = '".$pass."', id_rol = ".$rol." WHERE id = $id";
            $request = $this->update($query);

            return $request; //Retorna la consulta hecha en la clase SqlServer
        }


       
     
        
    }

?>