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


   
}

?>