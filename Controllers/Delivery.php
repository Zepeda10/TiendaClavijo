<?php 

class delivery extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function delivery(){
        $data = $this->model->getUsers();
        $this->views->getView($this,"Delivery",$data);
    }

    public function agregar(){
        $this->views->getView($this,"add_delivery");
    }

    public function agregarDelivery(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $celular = $_POST['celular'];
        $this->model->addDelivery($nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);
        header("Location: http://localhost/Tienda/delivery/delivery");
    }

    public function editar($id){
        $data = $this->model->getUser($id);
        $this->views->getView($this,"editar_delivery",$data);
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

        $this->model->updateDelivery($id,$nombre,$apellidos,$dni,$celular,$direccion,$email,$pass);
        header("Location: http://localhost/Tienda/delivery/delivery");
    } 

    public function eliminar($id){
        $this->model->deleteDelivery($id);
        header("Location: http://localhost/Tienda/delivery/delivery");
    }



}

?>