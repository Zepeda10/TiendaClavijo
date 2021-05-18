<?php 

class proveedores extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }



    public function proveedores(){
        /*
        $data["page_tag"] = "Proveedores";
        $data["page_title"] = "PROVEEDORES";
        $data["pag_name"] = "Proveedores";
        */
        $data = $this->model->getUsers();
        $this->views->getView($this,"Proveedores",$data);
    }

}

?>