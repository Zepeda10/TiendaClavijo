
    
    <!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="../Assets/images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row-auto">
					
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="col-auto text-center">
								
                                <h2>Terminar compra</h2>

                                <form action="../home/tarjetas" method="POST" class="mt-5 mx-auto">
                                    <div class="form-row my-3">
                                        <div class="col">
                                            <input type="text" name="numero" class="form-control" placeholder="Número de tarjeta">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="clave" class="form-control" placeholder="Clave">
                                        </div>
                                    </div>
                                    <div class="form-row my-3">
                                        <div class="col">
                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del propietario">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="fecha" class="form-control" placeholder="Fecha de vencimiento">
                                        </div>
                                        <div class="col">
                                            <input type="submit" class="btn btn-primary px-5" value="Confirmar">
                                        </div>                             
                                    </div>

                                   
                                        <div class="col">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3">
                                                <label class="form-check-label" for="inlineCheckbox3">Prefiero pagar al llegar</label>
                                            </div> 
                                        </div>  
                                        <div class="col">
                                            <button class="btn btn-success px-5">Regresar</button>
                                        </div>  
                                      

                                </form>

							</div>
						
					</div>
				
				</div>
			</div>
		</div>
	</div>