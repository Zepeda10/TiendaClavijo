<?php 

class pedidos extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function pedidos(){
        $data = $this->model->getPedidos();
        $this->views->getView($this,"Pedidos",$data);
    }


    public function confirmados(){
        $data = $this->model->getConfirmados();
        $this->views->getView($this,"Pedidosconfirmados",$data);
    }

    public function detalles($id){
        $data = $this->model->getDetalles($id);
        $this->views->getView($this,"PedidosDetalles",$data);
    }

    
	public function eliminar($id){
        $this->model->deletePedidoDentro($id);
        $this->model->deletePedido($id);
		header("Location: http://localhost/Tienda/pedidos/pedidos");
    }

    public function confirmar($id){
        $this->model->confirmarPedido($id);
		header("Location: http://localhost/Tienda/pedidos/pedidos");
    }

    public function eliminaConf($id){
        $this->model->eliminaConfirmado($id);
        header("Location: http://localhost/Tienda/pedidos/confirmados");
    }

    public function eliminaDetalle($id){
        $this->model->eliminaDetalle($id);
        header("Location: http://localhost/Tienda/pedidos/pedidos");
    }


}

?>