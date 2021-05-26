<?php 

    class Views{

        function getView($controller, $view,$data=""){
            $controller = get_class($controller);

            if($controller == "home"){
                $view = VIEWS.$view.".php";

            }else if($controller == "login"){
                $view = VIEWS.$view.".php";

            }else if($controller == "panel"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "panel"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "clientes"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "delivery"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "proveedores"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "productos"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "empleados"){
                $view = VIEWS."/Admin/".$view.".php";

            }else if($controller == "pedidos"){
                $view = VIEWS."/Admin/".$view.".php";

            }else{
                $view = VIEWS.$controller."/".$view.".php";
            }

           

            require_once($view);
        }
    }



?>