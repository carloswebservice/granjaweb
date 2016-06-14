
<!-- Contenido Raza-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Registro Personal - Granja Tarapoto
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
						<th class="center"># Codigo</th>
						<th class="center">DNI</th>
						<th class="center">Nombres</th>
						<th class="center">Apellido Paterno</th>
						<th class="center">Apellido Materno</th>
						<th class="center">Distrito</th>
						<th class="center">Dirección</th>
						<th class="center">Teléfono</th>

						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($personal as $value) { ?> <tr>
							<td class="center"><?php echo $value->per_id?></td>
							<td class="center"><?php echo $value->per_dni?></td>
							<td class="center"><?php echo $value->per_nombre?></td>
							<td class="center"><?php echo $value->per_apepa?></td>
							<td class="center"><?php echo $value->per_apema?></td>
							<td class="center"><?php echo $value->distrito?></td>
							<td class="center"><?php echo $value->per_direccion?></td>
							<td class="center"><?php echo $value->per_telefono?></td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->per_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->per_id; ?>)"></i></button>
							</td>
						</tr> <?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Mensaje Corpersonal-->
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
					<a href="#upers" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Personal</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="upers">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_personal"> <br>
								<input type="hidden" name="id" id="id" class="form-control">
								<input type="hidden" name="per_fecha" value="<?php echo date("Y-m-d"); ?>" class="form-control">
								<div class="form-group">
									<label class="col-sm-3 control-label">
											DNI
									</label>
									<div class="col-sm-9">
										<?php echo form_input('per_dni','', 'maxlength="8" class="form-control" required onkeypress="return solo_numeros(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
											Nombres
									</label>
									<div class="col-sm-9">
										<?php echo form_input('per_nombre','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
											Apellido Paterno
									</label>
									<div class="col-sm-9">
										<?php echo form_input('per_apepa','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
											Apellido Materno
									</label>
									<div class="col-sm-9">
										<?php echo form_input('per_apema','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
											Direccion
									</label>
									<div class="col-sm-9">
										<?php echo form_input('per_direccion','', 'class="form-control" required onkeypress="return numeros_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
											Teléfono
									</label>
									<div class="col-sm-9">
										<?php echo form_input('per_telefono','', 'class="form-control" required onkeypress="return solo_numeros(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Departamento
									</label>
									<div class="col-sm-9">
										<?php echo form_dropdown('', $departamentos,'', 'id="depa" class="form-control" required'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Provincia
									</label>
									<div class="col-sm-9 provincia">
										<select name="" id="" class="form-control">
											<option value="">Seleccione</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Distrito
									</label>
									<div class="col-sm-9 distrito">
										<select name="per_distrito" id="" class="form-control">
											<option value="">Seleccione</option>
										</select>
									</div>
								</div>


								  <br>

								<div class="form-group"> <center>
									<button type="button" class="btn btn-teal" onclick="return guardar(this.form);">
										<i class="fa fa-save"></i> Guardar
									</button>
									<button type="button" class="sb-toggle btn btn-danger" onclick="nuevocancel()">
										<i class="fa fa-times"></i> Canperar
									</button>
								</center> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Fin Contenido Raza-->