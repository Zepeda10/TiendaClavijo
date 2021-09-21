<?php 

    class LoginModel extends SqlServer{

        public function __construct(){
            parent::__construct();
        }

        public function validaLogin(string $user, string $pass){
            $query = "SELECT * FROM usuarios WHERE dni = '".$user."' and pass = '".$pass."' ";
            $request = $this->select($query);
                
            return $request; //Retorna la consulta hecha en la clase SqlServer
        }

        public function addCliente(string $nombre, string $apellidos, string $dni, string $celular, string $direccion, string $email, string $pass){
            $query = "INSERT INTO usuarios(nombre,apellidos,dni,celular,direccion,email,pass,id_rol) values('".$nombre."', '".$apellidos."', '".$dni."', '".$celular."', '".$direccion."', '".$email."', '".$pass."', 2)";
            $request_insert = $this->insert($query);

            return $request_insert; //Retorna la consulta hecha en la clase SqlServer

        }


        public function cerrarSesion(){
            session_start();
            session_destroy();

        }

  

     
        
    }

?>