<?php 

class clientes extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function clientes(){
        $data = $this->model->getUsers();
        $this->views->getView($this,"Clientes",$data);
    }

    public function agregar(){
        $this->views->getView($this,"add_cliente");
    }

    public function agregarCliente(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $celular = $_POST['celular'];
        $this->model->addCliente($nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);
        header("Location: http://localhost/Tienda/clientes/clientes");
    }

    public function editar($id){
        $data = $this->model->getUser($id);
        $this->views->getView($this,"editar_cliente",$data);
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

        $this->model->updateCliente($id,$nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);
        header("Location: http://localhost/Tienda/clientes/clientes");
    } 

    public function eliminar($id){
        $this->model->deleteCliente($id);
        header("Location: http://localhost/Tienda/clientes/clientes");
    }

}

?>