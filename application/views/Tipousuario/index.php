<!-- Contenido Tipo Usuarios-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Tipo Usuarios (Gestion Permisos) - Granja Tarapoto
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
						<th class="center">Tipo Usuario</th>
						<th class="center">Gestion Permisos</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($TipoUsuarios as $value) { ?> <tr>
							<td class="center"><?php echo $value->tiu_id?></td>
							<td class="center"><?php echo $value->tiu_descripcion?></td>
							<td class="center">
								<button class="btn btn-teal btn-xs" onclick="permisos(<?php echo $value->tiu_id; ?>)"><i class="fa fa-lock"></i> Ver Permisos</button>
							</td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->tiu_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->tiu_id; ?>)"></i></button>
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
	<style type="text/css">
		ul{
		    list-style: none;
		    text-align: left;
		}
		#nav li p{
		    padding-right: 40px;
		    display: block;
		}
		label{
		    font-size: 15px;
		}
		#nav > li{
		    float: left;
		}
		#nav li ul li{
		    padding-left: 10px;
		    display: block;
		}
	</style>
    <!-- Permisos-->
	<div id="permisos" class="modal fade" data-width="900" style="display: none;">
	    <div class="modal-header">
	    	<center><h4 class="modal-title"><i class="fa fa-spin fa-refresh"></i> Gestion Permisos</h4></center>
	    </div>
	    <form id="form_permisos">
	        <input type="hidden" id="tiu_id" name="tiu_id">
	       	<div id="cargamodulos" style="height: 200px; padding:10px; overflow-y: scroll;"> </div>
	       	<div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div> <br>
			<div class="form-group"> <center>
				<button type="button" class="btn btn-teal" onclick="grabar();">
					<i class="fa fa-save" ></i> Guardar Permisos
				</button>
				<button type="button" data-dismiss="modal" class="btn btn-danger">
					<i class="fa fa-times"></i> Cancelar
				</button>
			</center> </div>
	    </form>
	</div>

	<div id="page-sidebar">
		<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
		<div class="sidebar-wrapper">
			<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
				<li class="active" style="font-size:18px;padding:5px;">
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Tipo Usuario</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_tipousuario"> <br>
								<input type="hidden" name="id" id="id" class="form-control">
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Descripcion
									</label>
									<div class="col-sm-9">
										<input onkeypress="return solo_letras(event)" type="text" name="tiu_descripcion" id="tiu_descripcion" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Abreviatura
									</label>
									<div class="col-sm-9">
										<input onkeypress="return solo_letras(event)" type="text" name="tiu_abreviatura" id="tiu_abreviatura" class="form-control">
									</div>
								</div><br>

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
<!-- Fin Contenido Tipo Usuarios-->
