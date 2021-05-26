<?php 

class proveedores extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function proveedores(){
    
        $data = $this->model->getUsers();
        $this->views->getView($this,"Proveedores",$data);
    }

    public function agregar(){
        $this->views->getView($this,"add_proveedor");
    }

    public function agregarProveedor(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $celular = $_POST['celular'];
        $this->model->addProveedor($nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);
        header("Location: http://localhost/Tienda/proveedores/proveedores");
    }

    public function editar($id){
        $data = $this->model->getUser($id);
        $this->views->getView($this,"editar_proveedor",$data);
    }

    public function update(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $celular = $_POST['celular'];

        $this->model->updateProveedor($id,$nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);
        header("Location: http://localhost/Tienda/proveedores/proveedores");
    } 

    public function eliminar($id){
        $this->model->deleteProveedor($id);
        header("Location: http://localhost/Tienda/proveedores/proveedores");
    }


}

?>