
<!-- Contenido Raza-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Registro Reproductor - Granja Tarapoto
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
						<th class="center">Rp</th>
						<th class="center">Nacionalidad</th>
						<th class="center">Raza</th>
						<th class="center">Color</th>
						<th class="center">Foto</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($reproductor as $value) { ?> <tr>
							<td class="center"><?php echo $value->rep_id?></td>
							<td class="center"><?php echo $value->rep_rp?></td>
							<td class="center"><?php echo $value->rep_nacionalidad?></td>
							<td class="center"><?php echo $value->rep_raza?></td>
							<td class="center"><?php echo $value->rep_color?></td>
							<td class="center"><img width="200" height="100" src="<?php echo base_url()."Librerias/assets/images/".$value->rep_foto?>" alt=""></td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->rep_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->rep_id; ?>)"></i></button>
							</td>
						</tr> <?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Mensaje Correpto-->
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
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Reproductor</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_reproductor" enctype="multipart/form-data"> <br>
								<input type="hidden" name="id" id="id" class="form-control">
								<input type="hidden" name="foto_anterior" id="id" class="form-control">
								<input type="hidden" name="rep_fecha" value="<?php echo date("Y-m-d"); ?>" class="form-control">
								<div class="form-group">
									<label class="col-sm-3 control-label">
											Rp
									</label>
									<div class="col-sm-9">
										<?php echo form_input('rep_rp','', 'class="form-control" required onkeypress="return numeros_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Nacionalidad
									</label>
									<div class="col-sm-9">
										<?php echo form_input('rep_nacionalidad','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Raza
									</label>
									<div class="col-sm-9">
										<?php echo form_input('rep_raza','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Color
									</label>
									<div class="col-sm-9">
										<?php echo form_input('rep_color','', 'class="form-control" required onkeypress="return solo_letras(event)"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Foto
									</label>
									<div class="col-sm-9">
										<?php echo form_upload('rep_foto','', 'id="foto" class="form-control" required'); ?>
									</div>
								</div>

								  <br>

								<div class="form-group"> <center>
									<button type="button" class="btn btn-teal" onclick="return guardar(this.form);">
										<i class="fa fa-save"></i> Guardar
									</button>
									<button type="button" class="sb-toggle btn btn-danger" onclick="nuevocancel()">
										<i class="fa fa-times"></i> Canrepar
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