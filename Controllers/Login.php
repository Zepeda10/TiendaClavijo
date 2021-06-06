<?php 

class login extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function login(){
        $data["page_tag"] = "Login";
        $data["page_title"] = "Iniciar Sesión";
        $data["pag_name"] = "Login";

        $this->views->getView($this,"login",$data);
    }

    public function comprobar(){
        $user = $_POST['usuario'];
        $pass = md5($_POST['pass']);

        $data = $this->model->validaLogin($user,$pass);

        $rows = sqlsrv_has_rows($data);

        if ($rows === true){
            session_start();//iniciando sesión
			$_SESSION["usuario"] = $_POST['usuario'];//se almacena el nombre del usuario en la variable super global "$_SESSION['user']"
            $_SESSION["id"] = "";

            while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC) ) {
                //echo $row['nombre'].", ".$row['id_rol']."<br />";
                $_SESSION["rol"] = $row['id_rol'];
                $_SESSION["id"] = $row['id'];

            }

            if($_SESSION["rol"] !=2 ){ //Admin o similares
                header("Location: http://localhost/Tienda/panel/panel");

            }else if($_SESSION["rol"] == 2){ //Cliente
                header("Location: http://localhost/Tienda/home/home");

            }
            
           

        }else{
            $this->views->getView($this,"Errors/NoLogueado",$data);
        } 
            
    }

    public function cerrar(){
        $this->model->cerrarSesion();
        header("Location: ../");

    }

    public function registro(){    
        $this->views->getView($this,"RegistroClientes");
    }

    public function registrarse(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $celular = $_POST['celular'];
        $this->model->addCliente($nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);

        header("Location: http://localhost/Tienda/");
    }








    public function verusuario($id){
        $data = $this->model->getUser($id);
        while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC) ) {
            echo $row['id'].", ".$row['usuario']."<br />";
        }
    }

    public function verusuarios(){
        $data = $this->model->getUsers();

        while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC) ) {
            echo $row['id'].", ".$row['usuario']."<br />";
        }
        //print_r($data);
    }

    public function insertar(){
        $data = $this->model->setUser("Em4","Otro","apell","holacorreo","12",3);
        if( !$data ) {
            die( print_r( sqlsrv_errors(), true));
        }
        print_r($data);
    }

    public function actualizar($id){
        $data = $this->model->updateUser("nuevo ","Hildis",7);
        print_r($data);
    }

    public function eliminar($id){
        $data = $this->model->deleteUser($id);
        print_r($data);
    }


   
}

?>