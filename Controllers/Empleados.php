<?php 

class empleados extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function empleados(){
        $data = $this->model->getUsers();
        $this->views->getView($this,"Empleados",$data);
    }

    public function agregar(){
        $data = $this->model->getRoles();
        $this->views->getView($this,"add_empleado",$data);
    }

    public function agregarEmpleado(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $celular = $_POST['celular'];
        $rol = $_POST['id_rol'];
        $this->model->addEmpleado($nombre,$apellidos,$dni,$celular,$direccion,$email,$pass,$rol);
        header("Location: http://localhost/Tienda/empleados/empleados");
    }

    public function editar($id){
        $data['empleado'] = $this->model->getUser($id);
        $data['rol'] = $this->model->getRoles();
        $this->views->getView($this,"editar_empleado",$data);
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
        $rol = $_POST['id_rol'];

        $this->model->updateEmpleado($id,$nombre,$apellidos,$dni,$celular,$direccion,$email,$pass,$rol);
        header("Location: http://localhost/Tienda/empleados/empleados");
    } 

    public function eliminar($id){
        $this->model->deleteEmpleado($id);
        header("Location: http://localhost/Tienda/empleados/empleados");
    }


}

?>