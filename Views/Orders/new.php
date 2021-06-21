<?php
date_default_timezone_set('America/Bogota');
$hora_actual = date("h:i a");
?>
<main class="container">
	<section class="row mt-5">
		<div class="card m-100 m-auto w-100">
			<div class="card-header justify-content-center">
				<!-- <a href="?controller=login" class="btn btn-danger">Volver al login</a> -->
		        <h1 class="text-center">Registrar pedido</h1>
			</div>
			<div class="card-body w-100">
				<form action="?controller=order&method=save" method="POST" id="form_validation">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>Consecutivo:</label>
								<input type="text" name="consecutivo_pedido" value="P01" class="form-control">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Fecha:</label>
								<input type="text" class="form-control" name="Fecha_ingreso" value="<?php echo date('d/m/Y') ?>" readonly required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Fecha:</label>
								<input type="text" class="form-control" name="Hora_ingreso" value="<?php echo $hora_actual ?>" readonly required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>Identificacion</label>
								<input type="text" name="identificacion_cliente" value="" class="form-control">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" name="nombre_cliente" value="" readonly required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Apellido</label>
								<input type="text" class="form-control" name="cliente" value="" readonly required>
							</div>
						</div>
					</div>
					<h2>Informacion del producto  <button class="btn btn-danger" type="button" id="adicional" name="adicional">+Agregar producto</button></h2>
                   <input type="hidden" name="contador" id="contador" value="0">
                    <div id="table">
                       <div class="tde" data-section="section0">
                            <button type="button" id="eliminar" class="btn btn-danger float-right">X</button>
                            <div class="row clearfix">
                            	<input type="hidden" name="id_producto[]" class="id_producto" value="">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Referencia producto</label>
                                            <input type="number"  name="referencia_producto[]" id="referencia_producto" class="form-control referencia_producto">
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                            <div class="row clearfix">                                       
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Nombre producto</label>
                                            <input type="text" class="form-control nombre_producto" value="" name="nombre_producto[]" id="nombre_producto" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control cantidad" value="1" name="cantidad[]" id="cantidad" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Valor</label>
                                            <input type="number" class="form-control valor" value="" name="valor[]" id="valor" required>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                       </div>
                    </div>
                    <div class="form-group">
                    	<label>Valor final</label>
                    	<input type="number" name="valor_total_pedido" class="form-control valor_unitario_producto" id="valor_unitario_producto" readonly>
                    </div>
                    <div class="form-group">
                    	<button type="submit" class="btn btn-danger">Registrar</button>
                    </div>
				</form>
			</div>
		</div>
	</section>
</main>
