<?php 

    class Conexion{
        private $conect;

        public function __construct(){           
            $connectionInfo = array( "Database"=>DB_NAME, "CharacterSet" => "UTF-8");
            try{
                // Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
                // La conexión se intentará utilizando la autenticación Windows.
                
                $this->conect = sqlsrv_connect( DB_SERVER, $connectionInfo);
                
            }catch(PDOException $e){
                $this->conect = "Error de conexión";
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function conect(){
            return $this->conect;
        }

    }


?>