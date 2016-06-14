<!-- Contenido Modulo-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Modulos - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="sb-toggle btn btn-teal" onclick="nuevocancel()">
				<i class="fa fa-plus"></i> Nuevo Registro
			</button>
			<div style="margin-top:-30px;"></div>
			<table class="table table-bordered table-hover table-full-width" id="sample_1">
				<thead>
					<tr>
						<th class="center">Modulo</th>
						<th class="center">URL</th>
						<th class="center">Modulo Padre</th>
						<th class="center">Icono</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($Modulos as $value) { ?> <tr>
							<td class="center"><?php echo $value->hijo ?></td>
							<td class="center"><?php echo $value->url ?></td>
							<td class="center"><?php echo $value->padre ?></td>
							<td class="center"> <i class="<?php echo $value->icono ?>"></i></td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->idhijo; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->idhijo; ?>)"></i></button>
							</td>
						</tr> <?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Mensaje Correcto-->
	<div id="Alert" class="modal fade" data-width="369" style="display: none;">
	    <div class="row" id="Mensaje">
		    <center>
		    	<h4 class="modal-title">
			        <div class="col-md-2" id="iconomensaje">
			      	</div>
			        <div class="col-md-10" id="textomensaje">
			       	</div>
			    </h4> Sistema Granja Tarapoto <br><br>
			    <button type="button" data-dismiss="modal" class="btn btn-teal" onclick="actualizar()">
			        <i class="fa fa-times"></i> Ok. Cerrar
			    </button>
			</center>
		</div>
	</div>

	<div id="page-sidebar">
		<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
		<div class="sidebar-wrapper">
			<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
				<li class="active" style="font-size:18px;padding:5px;">
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Modulos</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_modulo"> <br>
								<input type="hidden" name="id" id="id" class="form-control">

								<div class="form-group">
									<label class="col-sm-3 control-label">
										Descripcion
									</label>
									<div class="col-sm-9">
										<input type="text" onkeypress="return solo_letras(event)" name="mod_descripcion" id="mod_descripcion" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										URL Modulo
									</label>
									<div class="col-sm-9">
										<input type="text" onkeypress="return solo_letras(event)" name="mod_url" id="mod_url" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Icono
									</label>
									<div class="col-sm-9">
										<input type="text" onkeypress="return numeros_letras(event)" name="mod_icono" id="mod_icono" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-field-1">
										Mod Padre
									</label>
									<div class="col-sm-7">
										<select class="form-control" id="mod_padre" name="mod_padre">
											<option value="modpadre">Seleccionar Modulo Padre </option>
											<?php
												foreach($ModPadres as $value){ ?>
													<option value="<?php echo $value->mod_id ?>"><?php echo $value->mod_descripcion ?></option>
												<?php }
											?>
										</select>
									</div>
									<div class="col-sm-2">
										<button class="btn btn-info"><i class="fa fa-plus"></i></button>
									</div>
								</div> <br>

								<div class="form-group"> <center>
									<button type="button" class="btn btn-teal" onclick="return guardar(this.form);">
										<i class="fa fa-save"></i> Guardar
									</button>
									<button type="button" class="sb-toggle btn btn-danger" onclick="nuevocancel()">
										<i class="fa fa-times"></i> Cancelar
									</button>
								</center> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
