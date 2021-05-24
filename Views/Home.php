<?php    
    include ("headerHome.php");
?>
	<!-- Product -->
<div class="sec-banner bg0 p-t-80 p-b-50">
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Catálogo de Productos
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Todos
					</button>

					<?php 
						while( $row = sqlsrv_fetch_array( $data['familias'], SQLSRV_FETCH_ASSOC) ) {
							echo '<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".'.$row['nombre'].'">';
							echo $row['nombre'];
							echo '</button>';
						}
					?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Buscar
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<form action="../home/buscar" id="formBuscar" method="POST">
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search-product" name="search-product" onkeyup="enterBuscar(event)" placeholder="Presione 'Enter'">
						</form>
					</div>	
				</div>
			</div>

			<div class="row isotope-grid">

				<?php
                    while( $row = sqlsrv_fetch_array( $data['productos'], SQLSRV_FETCH_ASSOC) ) {
                        echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$row['fam'].'">

						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">';
							if($row['imagen']!=""){
								echo "<img class='imagen ' src='../imagenes_subidas/".$row['imagen']."' width='250px' height='250px' />";
							}else{
								echo "<img class='imagen ' src='../imagenes_subidas/default.png' width='250px' height='250px' />";
							}
	
								echo '<button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="'.$row['id'].'" onclick="buscarProducto(id)">
									Agregar 
								</button>


							</div>
	
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									'.$row['nombre'].' 
									</a>
	
									<span class="stext-105 cl3">
									$'.$row['precio_venta'].'
									</span>
								</div>
	
								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="../Assets/images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../Assets/images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>';

                        
                    }
                ?>   

				
			<!-- Load more 
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
			-->
		</div>
	</section>
			<form id="myForm" action="../home/insertaTemporal" method="POST">
				<input type="hidden" id="folio_hidden" name="folio_hidden" placeholder="folio">   
				<input type="hidden" id="nombre_hidden" name="nombre_hidden" placeholder="producto">    
				<input type="hidden" id="barras_hidden" name="barras_hidden" placeholder="barras"> 
				<input type="hidden" id="cantidad_hidden" name="cantidad_hidden" placeholder="cantidad"> 
				<input type="hidden" id="precio_hidden" name="precio_hidden" placeholder="precio"> 
				<input type="hidden" id="subtotal_hidden" name="subtotal_hidden" placeholder="subtotal"> 
				<input type="hidden" id="imagen_hidden" name="imagen_hidden" placeholder="imagen"> 
				<input type="hidden" id="idProducto_hidden" name="idProducto_hidden" placeholder="id producto"> 
			</form>

</div>

	

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="../Assets/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="../Assets/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="../Assets/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="../Assets/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="../Assets/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Gupo Clavijo
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<?php    
    include ("ModalProductos.php");
?>




<!--===============================================================================================-->	
	<script src="../Assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/slick/slick.min.js"></script>
	<script src="../Assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="../Assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="../Assets/js/main.js"></script>

	<script>

		function buscarProducto(codigo){
			$.ajax({
    			url:'../home/contenidoCarrito/'+codigo,
    			success: function(resultado){				
					//console.log(resultado);
					var objJson = JSON.parse(resultado);
					console.log(objJson);
					console.log(objJson.id);
					//$("#nombre_carrito").val(objJson.nombre); SE MOSTRÓ EN EL CARRITO
					$("#folio_hidden").val("<?php echo $folio; ?>");
					$("#nombre_hidden").val(objJson.nombre);
					$("#barras_hidden").val(objJson.cod_barras);
					$("#cantidad_hidden").val(1);
					$("#precio_hidden").val(objJson.precio_venta);
					$("#subtotal_hidden").val(objJson.precio_venta);
					$("#imagen_hidden").val(objJson.imagen);
					$("#idProducto_hidden").val(objJson.id);

					agregarProducto();

					
				},
					error: function() {
        				console.log("No se ha podido obtener la información");
    				}

    		});
		}

		function agregarProducto(){	
			document.getElementById('myForm').submit();
			
		}

		function eliminarProducto(id_producto){
                    $.ajax({
                        url:'../home/eliminarProductoCarrito/'+id_producto,
                            success: function(resultado){
                            }
                    });

					window.location.href="../home/home";

		}

		function enterBuscar(event){
				if (event.which == 13 || event.keyCode == 13) {
					document.getElementById('formBuscar').submit();
					return false;
				}
				return true;
			
		}

	</script>


</body>
</html>