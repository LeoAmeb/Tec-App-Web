<?php
	/* Se verifica que existe una sesion, en caso de que no sea así, se muestra el login */
	if (!isset($_SESSION['validar'])) {
		header("location:index.php?action=ingresar");
		exit();
	}
	$inventario = new MvcController;
	$datos = $inventario->verProductos();
?>

<div class="container-fluid">
	    <div class="modal fade" id="modal-cliente">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Datos del <b>Cliente</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div><!-- /.modal-header -->
                <form method="post" action="index.php?action=detalle_venta">
                    <div class="modal-body"  style="height: 400px; overflow: scroll;">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ncliente">Nombre del Cliente:</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nombre(s)" name="ncliente" id="ncliente" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="correo">Correo:</label>
                                    <input type="mail" class="form-control form-control-sm" placeholder="Correo" name="correo" id="correo"  required>
                                </div>
                            </div>
                        </div>
                        <hr/>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Dirección" name="direccion" id="direccion" required>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ccelular">Celular:</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Celular" name="ccelular" id="ccelular" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cfecha">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control form-control-sm" placeholder="Fecha de Nacimiento" name="cfecha" id="cfecha" required>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div><!-- /.modal-footer -->
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-cancelar">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cancelar <b>Venta</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div><!-- /.modal-header -->
                <form method="post" action="index.php?action=detalle_venta">
                    <div class="modal-body">

                            <p>Verifique su cuenta.</p>

                            <div class="form-group">
                                <label for="usertxt">Usuario:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ingrese su usuario" name="usertxt" id="usertxt" required>
                            </div>


                            <div class="form-group">
                                <label for="acliente">Contraseña:</label>
                                <input type="passwordtxt" class="form-control form-control-sm" placeholder="Ingrese su contraseña" name="passwordtxt" id="passwordtxt"  required>
                            </div>

                    </div><!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div><!-- /.modal-footer -->
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal para aplicar un descuento -->
    <div class="modal fade" id="modal-descuento">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aplicar <b>Descuento</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div><!-- /.modal-header -->
                <form method="post" action="index.php?action=detalle_venta">
                    <div class="modal-body">

                            <p>Ingresa el descuento que desea aplicar.</p>

                            <div class="form-group">
                                <label for="desctxt">Descuento:</label>
                                <input type="decimal" step="any" class="form-control form-control-sm" placeholder="0.00" min="0" max="1" name="desctxt" id="desctxt" required>
                            </div>

                    </div><!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div><!-- /.modal-footer -->
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <!-- Modal para realizar un pago -->
  <div class="modal fade" id="modal-pago">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aplicar <b>Pago</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div><!-- /.modal-header -->
                <form method="post" action="index.php?action=detalle_venta">
                    <div class="modal-body">

                            <p>Ingresa el descuento que desea aplicar.</p>

                            <div class="form-group">
                                <label for="pagotxt">Descuento:</label>
                                <input type="decimal" step="any" class="form-control form-control-sm" placeholder="0.00" min="0" max="1" name="pagoctxt" id="pagotxt" required>
                            </div>

                    </div><!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Realizar Pago</button>
                    </div><!-- /.modal-footer -->
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
	<section class="content">
		<div class="row">
			<!--BOTONES AGREGAR-->
			<div class="col-lg-7 col-xs-12">
				<div class="card card-primary">
					<div class="card-header"></div>
					<div class="card-body">
						<div class="card-header with-border" id="cart-header">
							<form action="#" method="post">
								<div class="input-group" ng-controller="cartToolBox">
									<span class="input-group-btn"></span>
									<select data-live-search="true" name="customer_id" title="Please choose a customer" class="form-control customers-list dropdown-bootstrap">
										<option value="">Elige un cliente. </option>
										<option value="">PLEM </option>
										<option value="">ARTUGA </option>
									</select>
									<span class="input-group-btn">
											<button type="button" data-toggle="modal" data-target="#modal-cliente" class="btn btn-default" ng-click="openCreatingUser()" title="Add a customer">
											<i class="fa fa-user"></i>
											<span class="hidden-sm hidden-xs">Agregar Cliente</span>
											<span class="hidden-lg hidden-md">+1</span>
										</button>
										<button type="button" class="btn btn-default" title="Item">
											<i class="fa fa-plus"></i>
											<span class="hidden-sm hidden-xs">Producto</span>
										</button>
									</span>
								</div>
							</form>
						</div>
						<!--TICKET-->
							<table class="table" id="cart-item-table-header">
								<thead>
									<tr class="active">
										<td width="200" class="text-left">Productos</td>
										<td width="120" class="text-center hidden-xs">Precio Unitario</td>
										<td width="100" class="text-center">Cantidad</td>
										<td width="100" class="text-right">Precio Total</td>
									</tr>
								</thead>
							</table>
							<div class="direct-chat-messages" id="cart-table-body" style="padding:0px;">
								<table class="table" style="margin-bottom:0;">
								<tbody>
									<tr id="cart-table-notice" style="display: none;">
										<td colspan="4">Porfavor, agrega un producto</td>
									</tr>
									<tr cart-item-id="0" cart-item="" data-line-weight="0" data-item-barcode="18720048">
										<td width="200" class="text-left" style="line-height:30px;">
										<p style="width:45px;margin:0px;float:left">
											<a class="btn btn-sm btn-default quick_edit_item" href="javascript:void(0)" style="float:left;vertical-align:inherit;margin-right:10px;">
												<i class="fa fa-edit"></i>
											</a>
										</p>
										<p style="text-transform: uppercase;float:left;width:76%;margin-bottom:0px;" class="item-name">9984922192</p>
										</td>
										<td width="70" class="text-center item-unit-price hidden-xs" style="line-height:30px;">$ 0,0 </td>
										<td width="100" class="text-center item-control-btns">
											<div class="input-group input-group-sm">
												<span class="input-group-btn item-control-btns-wrapper">
													<button class="btn btn-default item-reduce">-</button>
													<button name="shop_item_quantity" value="1" class="btn btn-default" style="width:50px;">1</button>
													<button class="btn btn-default item-add">+</button>
												</span>
											</div>
										</td>
										<td width="70" class="text-right item-total-price" style="line-height:30px;">$ 0,0</td>
									</tr>
								</tbody>
								</table>
							</div>
							<table id="cart-details" class="table">
								<tfoot class="hidden-xs hidden-sm hidden-md">
									<tr class="active">
										<td width="200" class="text-left">Número de Productos ( <span class="items-number">1</span> )</td>
										<td width="150" class="text-right hidden-xs"></td>
										<td width="150" class="text-right">Precio sin IVA</td>
										<td width="90" class="text-right">
											<span class="cart-value">$ 0,0</span>
										</td>
									</tr>
									<tr class="active">
										<td></td>
										<td></td>
										<td class="text-right cart-discount-notice-area">Descuento</td>
										<td class="text-right cart-discount-remove-wrapper">
											<span class="cart-discount pull-right">$ 0,0</span>
										</td>
									</tr>
									<tr class="success taxes_large">
										<td>
											<div>
												<button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>IVA Total
												<span class="cart-item-vat pull-right">$ 0,0</span>
											</div>
										</td>
										<td></td>
										<td class="text-right"><strong>Monto a Pagar</strong></td>
										<td class="text-right"><span class="cart-topay pull-right">$ 0,0</span></td>
									</tr>
								</tfoot>
						</table>
					</div>
					<!--BOTONES DE PAGO Y DESCUENTO-->
					<div class="card-footer" id="cart-panel">
						<div class="btn-group btn-group-justified">
							<div class="btn-group ng-scope">
								<button type="button" class="btn btn-default btn-lg"  data-toggle="modal" data-target="#modal-pago">
									<i class="fa fa-money-bill" aria-hidden="true"></i>
									<span class="hidden-xs">Pagar</span>
								</button>
							</div>
							<div class="btn-group ng-scope" role="group" ng-controller="saveBox">
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="cart-discount" class="btn btn-default btn-lg"  data-toggle="modal" data-target="#modal-descuento">
									<i class="fa fa-gift"></i> <span class="hidden-xs">Descuento</span></button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default btn-lg" id="cart-return-to-order"  data-toggle="modal" data-target="#modal-cancelar">
									<i class="fa fa-sync"></i>
									<span class="hidden-xs">Cancelar Venta</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--PRODUCTOS-->
			<div class="col-lg-5">
				<div class="card card-warning">
					<div class="card-header with-border"></div>
					<div class="card-body">
							<form action="#" method="post" id="search-item-form">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-large btn-default"><i class="fa fa-search"></i>
										</button>
										<button type="button" class="enable_barcode_search btn btn-large btn-default"><i class="fa fa-barcode"></i></button>
									</div>
									<input autocomplete="off" type="text" name="item_sku_barcode" placeholder="Barcode, SKU, product name or category ..." class="form-control">
								</div>
							</form>
						</div>
						<div class="card-body">
							<div class="overflow-auto"style="max-height: 500px;">
								<div class="row">
									<?php
									foreach ($datos as $producto) {
										echo '<div class="col-md-4">
												<img onclick="anadir('.$producto['id_product'].','.$producto['code_producto'].',\''.$producto['name_product'].'\','.$producto['price_product'].','.$producto['stock'].',\''.$producto['id_category'].'\')" src="http://multi-nexopos.tendoo.org/public/modules/nexo/images/default.png" title="'.$producto['name_product'].'"width="150" height="150">
											</div>';
										}
									?>
								</div>
							</div>
				</div>
			</div>
		</div>
	</section>
</div>