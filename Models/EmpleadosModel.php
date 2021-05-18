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

       
     
        
    }

?>