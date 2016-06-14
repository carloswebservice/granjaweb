<!-- Contenido Animales-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Animales - Granja Tarapoto
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
						<th class="center"># RP</th>
						<th class="center">Nombre</th>
						<th class="center">Fecha Nac.</th>
						<th class="center">Raza</th>
						<th class="center">Tipo Reg.</th>
						<th class="center">Evolucion</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($Animales as $value) { ?> <tr>
							<td class="center"><?php echo $value->ani_rp?></td>
							<td class="center"><?php echo $value->ani_nombre?></td>
							<td class="center"><?php echo $value->ani_fechanac?></td>
							<td class="center"><?php echo $value->ani_raza?></td>
							<td class="center"><?php echo $value->ani_tiporegi?></td>
							<td class="center">
								<button class="btn btn-teal btn-xs" onclick="evolucion('<?php echo $value->ani_id ?>')"><i class="fa fa-edit"></i> Evolucion Fotos</button>
							</td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar('<?php echo $value->ani_id ?>')"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->ani_id; ?>)"></i></button>
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

	<!-- Fotos Evolucion Animal-->
	<div id="Evolucion" class="modal fade" data-width="800" style="display: none;">
	    <div class="modal-header">
	    	<center><h4 class="modal-title"><i class="fa fa-signal"></i> Evolucion Animal - Galeria</h4></center>
	    </div>
	    <form class="form-horizontal" id="form_foto" enctype="multipart/form-data" style="padding: 10px;">
	    		<input type="hidden" id="fot_animal" name="fot_animal">
		    	<div class="row">
		    		<div class="col-md-8"> <br>
						<center>
							<p style="font-size: 15px;"> Descripcion (Por Ejemplo: 3 meses de edad) </p>
						</center>
						<input type="text" name="fot_descripcion" id="fot_descripcion" class="form-control" >
						<br>
						<div class="form-group"> <center>
							<button type="button" class="btn btn-teal" onclick="return guardarfoto(this.form);">
								<i class="fa fa-save" ></i> Guardar Foto
							</button>
							<button type="button" data-dismiss="modal" class="btn btn-danger">
								<i class="fa fa-times"></i> Cerrar Galery
							</button>
						</center> </div>
		    		</div>
		    		<div class="col-md-4">
		    			<div class="fileupload fileupload-new" data-provides="fileupload">
		    				<center>
							<div class="fileupload-new thumbnail" style="width: 150px; height: 100px;">
								<img src="" alt="">
							</div>
							<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 100px; line-height: 20px;"></div>
								<span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Seleccionar</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Cambiar</span>
									<input type="file" id="imagen" name="imagen">
								</span>
							</center>
						</div>
		    		</div>
		   		</div>
	    </form>
		<div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div>

		<div style="height: 200px; padding:10px; overflow-y:scroll;">
			<center><h4>Evolucion Del Animal</h4></center>
		    <div id="galery"> </div>
	    </div>
	</div>

	<div id="page-sidebar">
		<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
		<div class="sidebar-wrapper">
			<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
				<li class="active" style="font-size:18px;padding:5px;">
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Animal</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="users-list">
						<ul class="media-list">
							<li class="media">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="form-horizontal" id="form_tiporegistro"><br>
											<div class="form-group">
												<h5>
													<center><i class="fa fa-clipboard"></i> Seleccione Tipo De Registro</center>
												</h5>
											</div>
											<div class="form-group">
												<center>
													<label class="radio-inline">
														<input type="radio" class="flat-green"checked="checked">
														<a href="#" id="compra">Registro Por Compra</a>
													</label>
													<label class="radio-inline">
														<input type="radio" class="flat-green" checked="checked">
														<a href="#" id="nacimiento">Registro Por Nacimiento</a>
													</label>
												</center>
											</div> <br>
											<div class="form-group"> <center>
												<button type="button" class="sb-toggle btn btn-danger" onclick="nuevocancel()">
														<i class="fa fa-times"></i> Cancelar
												</button>
											</center> </div>
										</form>
									</div>
								</div>
							</li>
						</ul>
					</div>

					<div class="user-chat">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form-horizontal" id="form_animal"> <br>
									<input type="hidden" name="id" id="id" class="form-control">
									<input type="hidden" name="ani_fechareg" id="ani_fechareg" value="<?php echo date('d-m-Y'); ?>">
									<input type="hidden" name="ani_tiporeg" id="ani_tiporeg">
									<div class="form-group">
										<label class="col-sm-3 control-label">
											RP Animal
										</label>
										<div class="col-sm-9">
											<input onkeypress="return numeros_letras(event)" type="text" name="ani_rp" id="ani_rp" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Nombre
										</label>
										<div class="col-sm-9">
											<input onkeypress="return solo_letras(event)" type="text" name="ani_nombre" id="ani_nombre" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Raza Animal
										</label>
										<div class="col-sm-9">
											<select class="form-control" id="ani_raza" name="ani_raza">
												<option value="raza">Seleccione Raza</option>
												<?php
													foreach ($Razas as $value) { ?>
														<option value="<?php echo $value->raz_id?>"><?php echo $value->raz_descripcion ?></option>
													<?php }
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Madre Animal
										</label>
										<div class="col-sm-9">
											<input type="text" name="ani_madre" id="ani_madre" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Padre Animal
										</label>
										<div class="col-sm-9">
											<input type="text" name="ani_padre" id="ani_padre" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Fecha Nac.
										</label>
										<div class="col-sm-9">
											<input type="text" data-date-format="dd-mm-yyyy" class="form-control date-picker" id="ani_fechanac" name="ani_fechanac">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Sexo Animal
										</label>
										<div class="col-md-9">
											<label class="radio-inline">
												<input type="radio" id="macho" name="ani_sexo" value="M">Macho
											</label>
											<label class="radio-inline">
												<input type="radio" id="hembra" name="ani_sexo" value="H">Hembra
											</label>
										</div>
									</div>
									<div class="form-group" id="proveedor">
										<label class="col-sm-3 control-label">
											Proveedor
										</label>
										<div class="col-sm-9">
											<input onkeypress="return solo_letras(event)" type="text" name="ani_proveedor" id="ani_proveedor" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">
											Descripcion
										</label>
										<div class="col-sm-9">
											<input type="text" onkeypress="return numeros_letras(event)" name="ani_descripcion" id="ani_descripcion" class="form-control">
										</div>
									</div>

									<div class="form-group"> <center>
										<button type="button" class="btn btn-teal" onclick="return guardar(this.form);">
											<i class="fa fa-save"></i> Guardar
										</button>
										<button type="button" class="sidebar-back btn btn-warning">
											<i class="fa fa-chevron-circle-left"></i> Atras
										</button>
									</center> </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Fin Contenido Animales-->