<?php 
	$id_compra = uniqid();
    $fecha = Date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../Assets/images/icono-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Ventas
        </a>
        <?php  
        session_start();//reanudando sesión
        if($_SESSION['rol'] == 1 ){ ?>
        <a class="navbar-brand" href="../panel/panel">
            Ir a panel
        </a>
        <?php } ?>
        <a class="navbar-brand" href="../ventas/cerrar">
            Cerrar Sesión
        </a>
    </nav>

<div class="container">
    <h2 class="fw-300 centrar-texto mb-3">Vender</h2>
    <form action="../ventas/terminarCompra" method="POST" id="frmVender" name="frmVender" accept-charset="utf-8">
        <input id="id_producto" type="hidden" name="id_producto" value="">
        <input id="id_compra" type="hidden" name="id_compra" value='<?php echo $id_compra; ?>'>
        <input id="fecha" type="hidden" name="fecha" value='<?php echo $fecha; ?>'>

        <fieldset>
            <legend>Productos</legend>

            <div class="row my-3">
                <div class="col">
                    <label for="nombre">Nombre del producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre" readonly>
                </div>
                <div class="col">
                    <label for="cod_barras">Código de Barras</label>
                    <input type="text" class="form-control" id="cod_barras" name="cod_barras" placeholder="Código de Barras" onkeyup="buscarProducto(event,this,this.value)" autofocus>
                    <label for="codigo" id="resultado_error"></label>
                </div>
                <div class="col">
                    <label for="cantidad">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" placeholder="Cantidad" name="cantidad">
                </div>
                <div class="col">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input type="text" class="form-control" id="precio_unitario" placeholder="Precio" name="precio_unitario" readonly="true">
                </div>
                <div class="col">
                    <label for="subtotal">Subtotal</label>
                    <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal" readonly="true">
                </div>
            </div>
    
            <button type="button" class="btn btn-primary" id="agregarProducto" name="agregarProducto" onclick="agregaProducto(id_producto.value,'<?php echo $id_compra; ?>',cantidad.value)">Agregar</button>

        </fieldset>

        <table class="table mt-5" id="tablaProductosVenta">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Código de barras</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        
        <h2 class="mt-5">Total</h2>
        <input type="text" class="form-control" id="total" name="total" readonly="true" value="0.0">

        <button type="button" class="btn btn-success mt-3" id="completaCompra">Completar compra</button>

    </form>

  
</div>


</body>
</html>
<script src="../Assets/js/jquery-3.6.0.js"></script>
<script>

    $(document).ready(function(){
            $("#completaCompra").click(function(){
                let nFila = $("#tablaProductosVenta tr").length;

                if(nFila<2){ //significa que no hay datos, solo está el encabezado de la tabla
                    alert("No hay productos en el carrito de compra");
                }else{
                    $("#frmVender").submit();
                }

            });
    	});

    	function buscarProducto(e,tagCodigo,codigo){
    		var enterKey = 13;

    		if(codigo!=''){		
    			if(e.which==enterKey){

    				console.log("enter");

    				$.ajax({
    					url:'../ventas/buscarPorCodigo/'+codigo,
    						success: function(resultado){
                                var objJson = JSON.parse(resultado);
                                console.log(objJson);
					            console.log(objJson.error);

    							if(objJson==0){
    								$(tagCodigo).val('');
    							}else{
    								$(tagCodigo).removeClass('has-error');
    								$("#resultado_error").html(objJson.error);

    								if(objJson.error==""){
    									$("#id_producto").val(objJson.id);
    								 	$("#nombre").val(objJson.nombre);							
    									$("#precio_unitario").val(objJson.precio_venta);
    									$("#cantidad").val(1);
    									$("#subtotal").val(objJson.precio_venta);
    									$("#cantidad").focus();

    									console.log("existe");


    								}else if(objJson.error!=""){
    									$("#id_producto").val('');
    									$("#nombre").val('');							
    									$("#precio_unitario").val('');
    									$("#cantidad").val('');
    									$("#subtotal").val('');
                                        
    									console.log("noo existe");
    								}
    							}
    						}

    				});
 
    			}

    		}

    	}


    	function agregaProducto(id_producto,id_compra,cantidad){

    		if(id_producto!=null && id_producto!=0 && cantidad > 0){		

    				console.log("click agregar");

                    var datos = id_producto+","+cantidad+","+id_compra;

    				$.ajax({
    					url:'../ventas/insertaProdTemp/'+datos,
    						success: function(resultado){
                                    var objJson = JSON.parse(resultado);
                                    
                                        $("#tablaProductosVenta tbody").empty();
                                        $("#tablaProductosVenta tbody").append(objJson.info);
                                        $("#total").val(objJson.total);

                                        $("#id_producto").val('');
                                        $("#cod_barras").val('');
                                        $("#nombre").val('');                          
                                        $("#precio_unitario").val('');
                                        $("#cantidad").val('');
                                        $("#subtotal").val('');
                                    
    							
    						}

    				});

    		}

    	}

        function eliminarProducto(id_producto){
                    $.ajax({
                        url:'../ventas/eliminarProdVenta/'+id_producto,
                            success: function(resultado){
                                    var objJson = JSON.parse(resultado);
                                    
                                    $("#tablaProductosVenta tbody").empty();
                                    $("#tablaProductosVenta tbody").append(objJson.info);
                                    $("#total").val(objJson.total);
                                
                            }

                    });
 
        }

    </script>