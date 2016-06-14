
<!-- Contenido Raza-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Registro Servicio - Granja Tarapoto
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
						<th class="center">Animal</th>
						<th class="center">Reproductor</th>
						<th class="center">Personal</th>
						<th class="center">Tipo Servicio</th>
						<th class="center">Fecha</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($servicio as $value) { ?> <tr>
							<td class="center"><?php echo $value->ser_id?></td>
							<td class="center"><?php echo $value->ani_rp?></td>
							<td class="center"><?php echo $value->rep_rp?></td>
							<td class="center"><?php echo $value->per_nombre." ".$value->per_apepa." ".
							$value->per_apema?></td>
							<td class="center"><?php echo $value->tps_descripcion?></td>
							<td class="center"><?php echo $value->ser_fecha?></td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->ser_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->ser_id; ?>)"></i></button>
							</td>
						</tr> <?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Mensaje Corserto-->
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
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Servicio</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_servicio"> <br>
								<input type="hidden" name="id" id="id" class="form-control">
								<input type="hidden" name="evento" value="4">

								<div class="form-group">
									<label class="col-sm-3 control-label">
											Animal
									</label>
									<div class="col-sm-9">
										<?php echo form_dropdown('ser_animal', $animales,'', 'class="form-control" required'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Reproductor
									</label>
									<div class="col-sm-9">
										<?php echo form_dropdown('ser_reproductor', $reproductor,'', 'class="form-control" required'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Personal
									</label>
									<div class="col-sm-9">
										<?php echo form_dropdown('ser_personal', $personal,'', 'class="form-control" required'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Tipo de Servicio
									</label>
									<div class="col-sm-9">
										<?php echo form_dropdown('ser_tipo_servicio', $tipo_servicio,'', 'class="form-control" required'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Fecha Evento
									</label>
									<div class="col-sm-9">
										<input type="text"  onkeypress="return nada(event)" name="fechaevento" id="fechaevento" class="form-control">
									</div>
								</div>
								  <br>

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
<!-- Fin Contenido Raza-->