
<!-- Contenido Raza-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Servicio Tipo Servicio- Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="sb-toggle btn btn-teal" onclick="nuevocancel()">
				<i class="fa fa-plus"></i> Nuevo Servicio
			</button>
			<div style="margin-top:-30px;"></div>
			<table class="table table-bordered table-hover table-full-width" id="sample_1">
				<thead>
					<tr>
						<th class="center"># Codigo</th>
						<th class="center">Descripcion</th>
						<th class="center">Abreviatura</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($tipo_servicio as $value) { ?> <tr>
							<td class="center"><?php echo $value->tps_id?></td>
							<td class="center"><?php echo $value->tps_descripcion?></td>
							<td class="center"><?php echo $value->tps_abreviatura?></td>


							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modifitps(<?php echo $value->tps_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->tps_id; ?>)"></i></button>
							</td>
						</tr> <?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Mensaje Cortipo_servicio-->
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
			<ul class="nav nav-tabs nav-justified" id="stpsbar-tab">
				<li class="active" style="font-size:18px;padding:5px;">
					<a href="#utpss" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Servicio Tipo Analisis</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="utpss">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_tipo_servicio"> <br>
								<input type="hidden" name="id" id="id" class="form-control">

								<div class="form-group">
									<label class="col-sm-3 control-label">
											Descripcion
									</label>
									<div class="col-sm-9">
										<?php echo form_input('tps_descripcion','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Abreviatura
									</label>
									<div class="col-sm-9">
										<?php echo form_input('tps_abreviatura','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
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