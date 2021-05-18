<?php 

class home extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $data["page_tag"] = "Home";
        $data["page_title"] = "Pàgina Principal";
        $data["pag_name"] = "Home";

        $this->views->getView($this,"Home",$data);
    }

    public function insertar(){
        $data = $this->model->setUser("Rocio",23);
        print_r($data);
    }

    public function verusuario($id){
        $data = $this->model->getUser($id);
        print_r($data);
    }

    public function actualizar($id){
        $data = $this->model->updateUser(1,"Hildis",24);
        print_r($data);
    }

    public function verusuarios(){
        $data = $this->model->getUsers();
        print_r($data);
    }

    public function eliminar($id){
        $data = $this->model->deleteUser($id);
        print_r($data);
    }
}

?>