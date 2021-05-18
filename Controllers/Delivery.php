<?php 

class delivery extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function delivery(){
        /*
        $data["page_tag"] = "Delivery";
        $data["page_title"] = "DELIVERY";
        $data["pag_name"] = "Delivery";
        */
        $data = $this->model->getUsers();
        $this->views->getView($this,"Delivery",$data);
    }


}

?>