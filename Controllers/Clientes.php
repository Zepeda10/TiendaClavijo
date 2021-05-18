<?php 

class clientes extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }



    public function clientes(){
        /*
        $data["page_tag"] = "Clientes";
        $data["page_title"] = "CLIENTES";
        $data["pag_name"] = "Clientes";
        */
        $data = $this->model->getUsers();
        $this->views->getView($this,"Clientes",$data);
    }

}

?>