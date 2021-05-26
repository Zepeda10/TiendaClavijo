<?php 

class panel extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function panel(){
        $data["page_tag"] = "Panel de administración";
        $data["page_title"] = "Dashboard";
        $data["pag_name"] = "Dashboard";

        $this->views->getView($this,"Panel",$data);
    }

    public function roles(){
        $data = $this->model->getRoles();
        $this->views->getView($this,"Roles",$data);
    }

    public function familias(){
        $data = $this->model->getFamilias();
        $this->views->getView($this,"Familias",$data);
    }

    public function muestraAgregarFam(){
        $this->views->getView($this,"add_familia");
    }

    public function agregarFamilia(){
        $nombre = $_POST['nombre'];
        $this->model->addFamilia($nombre);
        header("Location: http://localhost/Tienda/panel/familias");
    }

    public function editarFam($id){
        $data['familia'] = $this->model->getFamilia($id);
        $this->views->getView($this,"editar_familia",$data);
    } 

    public function updateFam(){
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $this->model->updateFamilia($nombre,$id);
        header("Location: http://localhost/Tienda/panel/familias");
    }

    public function eliminarFam($id){
        $this->model->deleteFamilia($id);
        header("Location: http://localhost/Tienda/panel/familias");
    }


   
}

?>