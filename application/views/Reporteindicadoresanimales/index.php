<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Indicadores Animales - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row invoice">
        <div class="col-sm-12" id="tablareporte">
            <div class="panel panel-default">
            	<form id="form_controles"> 
	                <div class="panel-heading">
	                    <i class="fa fa-calendar"></i>
	                    <center>
	                        Reporte Indicadores Animales - Animales
	                    </center>
	                    <div class="panel-tools">
	                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
								<i class="fa fa-print"></i> Imprimir Reporte
							</a>
	                    </div>
	                </div>
	                <div class="panel-body">
	                    <div class="tabbable tabs-left">
							<ul id="myTab3" class="nav nav-tabs tab-green">
								<li class="active">
									<a href="#secar_preñez" data-toggle="tab">
										<i class="pink fa fa-rocket"></i> Secar Por Preñez (>=7 meses Preñez)
									</a>
								</li>
								<li class="">
									<a href="#para_tacto" data-toggle="tab">
										<i class="blue fa fa-rocket"></i> Para Tacto (>=45 dias Preñez Confirmada)
									</a>
								</li>
								<li class="">
									<a href="#a_parir" data-toggle="tab">
										<i class="fa fa-rocket"></i> A Parir (<= 7 dias Fecha Probable Parto)
									</a>
								</li>
								<li class="">
									<a href="#repetidoras" data-toggle="tab">
										<i class="fa fa-rocket"></i> Repetidoras (>1 Servicio del Ultimo Parto)
									</a>
								</li>
								<li class="">
									<a href="#indicaciones_rechazo" data-toggle="tab">
										<i class="fa fa-rocket"></i> Indicaciones De Rechazo (Listado De Animales)
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="secar_preñez">
									<center> <h4>Secar Por Preñez (>=7 meses Preñez)</h4> </center>
									<table class="table table-bordered table-hover">
										<thead>
											<th class="center">RP Animal</th>
											<th class="center">Nombre</th>
											<th class="center">Fecha Nacimiento</th>
											<th class="center">Descripcion</th>
										</thead> 
										<tbody>
											<?php 
												foreach ($secarpreñes as $key => $value) { ?>
													<tr>
														<td class="center"><?php echo $value[0]["ani_rp"]?></td>
														<td class="center"><?php echo $value[0]["ani_nombre"]?></td>
														<td class="center"><?php echo $value[0]["ani_fechanac"]?></td>
														<td class="center"><?php echo $value[0]["ani_descripcion"]?></td>
													</tr>
												<?php }
											?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="para_tacto">
									<center> <h4>Para Tacto (>=45 dias Preñez Confirmada)</h4> </center>
									<table class="table table-bordered table-hover">
										<thead>
											<th class="center">RP Animal</th>
											<th class="center">Nombre</th>
											<th class="center">Fecha Nacimiento</th>
											<th class="center">Descripcion</th>
										</thead> 
										<tbody>
											<?php 
												foreach ($paratacto as $key => $value) { ?>
													<tr>
														<td class="center"><?php echo $value[0]["ani_rp"]?></td>
														<td class="center"><?php echo $value[0]["ani_nombre"]?></td>
														<td class="center"><?php echo $value[0]["ani_fechanac"]?></td>
														<td class="center"><?php echo $value[0]["ani_descripcion"]?></td>
													</tr>
												<?php }
											?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="a_parir">
									<center> <h4>A Parir (<= 7 dias Fecha Probable Parto)</h4> </center>
									<table class="table table-bordered table-hover">
										<thead>
											<th class="center">RP Animal</th>
											<th class="center">Nombre</th>
											<th class="center">Fecha Nacimiento</th>
											<th class="center">Descripcion</th>
										</thead>
										<tbody>
											<?php 
												foreach ($aparir as $key => $value) { ?>
													<tr>
														<td class="center"><?php echo $value[0]["ani_rp"]?></td>
														<td class="center"><?php echo $value[0]["ani_nombre"]?></td>
														<td class="center"><?php echo $value[0]["ani_fechanac"]?></td>
														<td class="center"><?php echo $value[0]["ani_descripcion"]?></td>
													</tr>
												<?php }
											?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="repetidoras">
									<center> <h4>Repetidoras (>1 Servicio del Ultimo Parto)</h4> </center>
									<table class="table table-bordered table-hover">
										<thead>
											<th class="center">RP Animal</th>
											<th class="center">Nombre</th>
											<th class="center">Fecha Nacimiento</th>
											<th class="center">Descripcion</th>
										</thead>
										<tbody>
											<?php 
												foreach ($repetidoras as $key => $value) { ?>
													<tr>
														<td class="center"><?php echo $value[0]["ani_rp"]?></td>
														<td class="center"><?php echo $value[0]["ani_nombre"]?></td>
														<td class="center"><?php echo $value[0]["ani_fechanac"]?></td>
														<td class="center"><?php echo $value[0]["ani_descripcion"]?></td>
													</tr>
												<?php }
											?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="indicaciones_rechazo">
									<center> <h4>Indicaciones De Rechazo (Listado De Animales)</h4> </center>
									<table class="table table-bordered table-hover">
										<thead>
											<th class="center">RP Animal</th>
											<th class="center">Nombre</th>
											<th class="center">Fecha Nacimiento</th>
											<th class="center">Descripcion</th>
										</thead>
										<tbody>
											<?php 
												foreach ($indicaciones as $key => $value) { ?>
													<tr>
														<td class="center"><?php echo $value[0]["ani_rp"]?></td>
														<td class="center"><?php echo $value[0]["ani_nombre"]?></td>
														<td class="center"><?php echo $value[0]["ani_fechanac"]?></td>
														<td class="center"><?php echo $value[0]["ani_descripcion"]?></td>
													</tr>
												<?php }
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
	                </div>
	            </form>
            </div>
        </div>
    </div>
<!-- Fin Contenido Calendario-->