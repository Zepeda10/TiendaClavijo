<?php 

class productos extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function productos(){
        $data = $this->model->getProductos();
        $this->views->getView($this,"Productos",$data);
    }

}

?>