<!-- Contenido Usuarios-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Lista Usuarios - Granja Tarapoto
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
						<th class="center"># DNI</th>
						<th class="center">Personal</th>
						<th class="center">Tipo Usuario</th>
						<th class="center">Nombre Usuario</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($Usuarios as $value) { ?> <tr>
							<td class="center"><?php echo $value->dni?></td>
							<td class="center"><?php echo $value->nombre ." ". $value->apellido?></td>
							<td class="center"><?php echo $value->tipouser?></td>
							<td class="center"><?php echo $value->usu_nombre?></td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->usu_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->usu_id; ?>)"></i></button>
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
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Usuario</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_usuario"> <br>
								<input type="hidden" name="id" id="id" class="form-control">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-field-1">
										Personal
									</label>
									<div class="col-sm-9">
										<select class="form-control" id="usu_personal" name="usu_personal">
											<option value="personal">Seleccionar Personal</option>
											<?php
												foreach($Personal as $value){ ?>
													<option value="<?php echo $value->per_id ?>"><?php echo $value->per_nombre." ".$value->per_apepa ?></option>
												<?php }
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-field-1">
										Tipo Usuario
									</label>
									<div class="col-sm-9">
										<select class="form-control" id="usu_tipousuario" name="usu_tipousuario">
											<option value="tipousuario">Seleccionar Tipo Usuario</option>
											<?php
												foreach($TipoUsuarios as $value){ ?>
													<option value="<?php echo $value->tiu_id ?>"><?php echo $value->tiu_descripcion ?></option>
												<?php }
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Nombre User
									</label>
									<div class="col-sm-9">
										<input type="text" name="usu_nombre" id="usu_nombre" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Clave User
									</label>
									<div class="col-sm-9">
										<input type="password" name="usu_clave" id="usu_clave" class="form-control">
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
<!-- Fin Contenido Usuario-->

