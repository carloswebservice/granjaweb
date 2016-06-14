<?php
	function detect(){
		$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
		$info['browser'] = "OTHER";
		foreach($browser as $parent){
			$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
			if ($s){
				$info['browser'] = $parent;
			}
		}
		return $info;
	}
	$info=detect();
	if ($info["browser"] =="FIREFOX") { ?>
		<style type="text/css">
			.diaevento {
				margin-left: -25px !important;
				margin-top: 6px !important;
			}
		</style>
	<?php }
?> 

<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Calendario - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar"></i>
                    <center>
                     	<button type="button" class="btn btn-default btn-xs" onclick="prevaño();">
                     		<i class="fa fa fa-arrow-circle-left"></i>
                     	</button>
                        Calendario de control de animales - AÑO <span id="añocalendar"> <?php echo $_SESSION['añocalendar']; ?></span>
                        <button type="button" class="btn btn-default btn-xs" onclick="nextaño();">
                        	<i class="fa fa fa-arrow-circle-right"></i>
                        </button>
                    </center>
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"></a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                            <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="fa fa-resize-full"></i>
                        </a>
                        <a onclick="imprimir(calendario);" class="btn btn-xs btn-teal hidden-print">
							<i class="fa fa-print"></i> Imprimir Reporte
						</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover invoice" id="calendario" >
                        <thead>
                            <tr>
                                <th class="center">RP</th>
                                <th class="center">Nombre</th>
                                <th class="center">Ene</th>
                                <th class="center">Feb</th>
                                <th class="center">Mar</th>
                                <th class="center">Abr</th>
                                <th class="center">May</th>
                                <th class="center">Jun</th>
                                <th class="center">Jul</th>
                                <th class="center">Ago</th>
                                <th class="center">Sep</th>
                                <th class="center">Oct</th>
                                <th class="center">Nov</th>
                                <th class="center">Dic</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($Animales['animal'] as $key => $animal) { ?> <tr>
                                    <td class="center" ><?php echo $animal['ani_id']." / ".$animal['ani_rp'] ?></td>
                                    <td class="center" ><?php echo $animal['ani_nombre'] ?></td>

                                    <!-- Enero-->
                                    <td class="sb-toggle center">
                                     	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                      		$fecha=explode("-",$evento['eveani_fecha']);
	                                     	if ($fecha[1]=="01" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                     	<i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                      		<span class="diaevento"><?php echo $fecha[2]?></span>
		                                    	</i>
	                                     	<?php } 
	                                    } ?>
	                                </td>
	                                <!-- Febrero -->
                                    <td class="sb-toggle center">
                                     	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                      		$fecha=explode("-",$evento['eveani_fecha']);
	                                     	if ($fecha[1]=="02" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                     	<i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top" id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                        	<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                     	</i>
	                                     	<?php } 
	                                    } ?>
	                                </td>
	                                <!-- Marzo -->
                                    <td class="sb-toggle center">
                                     	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="03" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
	                                <!-- Abril -->
                                    <td class="sb-toggle center">
                                     	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                     		$fecha=explode("-",$evento['eveani_fecha']);
	                                    	if ($fecha[1]=="04" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                    	<i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                    		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                    	<?php } 
	                                    } ?>
	                                </td>
	                                <!-- Mayo -->
                                    <td class="sb-toggle center">
                                     	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="05" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                        	<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
	                                <!-- Junio -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="06" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
	                                <!-- Julio -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                       	if ($fecha[1]=="07" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top" id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
	                                <!-- Agosto -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="08" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
									<!-- Septiembre -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="09" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
                                    <!-- Octubre -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="10" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top" id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
	                                <!-- Noviembre -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                         	$fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="11" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php } 
	                                    } ?>
	                                </td>
	                                <!-- Diciembre -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($animal['eventos'] as $key => $evento) { 
                                            $fecha=explode("-",$evento['eveani_fecha']);
	                                        if ($fecha[1]=="12" && $fecha[0]==$_SESSION['añocalendar']) { ?>
		                                        <i style="color: <?php echo $evento['eve_color'] ?>" class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"   id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                            <span class="diaevento" ><?php echo $fecha[2]?></span>
		                                        </i>
	                                        <?php }
	                                    } ?>
	                                </td>
                                </tr> <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
	    
	<!-- Para El Registro Nuevo-->
	<div id="page-sidebar">
			<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
			<div class="sidebar-wrapper">
				<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
					<li class="active" style="font-size:18px;padding:5px;">
						<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Evento</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="users">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form-horizontal" id="form_evento"> <br>
									<input type="hidden" id="id" name="id">
									<input type="hidden" id="refevento" name="refevento">
									<input type="hidden" id="ani_id" name="ani_id">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="form-field-1">
											Evento
										</label>
										<div class="col-sm-9">
											<select class="form-control" id="evento" name="evento">
												<option value="evento">Seleccionar Evento</option>
												<?php 
													foreach($Eventos as $value){ ?>
														<option value="<?php echo $value->eve_id ?>"><?php echo $value->eve_descripcion ?></option>
													<?php }
												?>
											</select>
										</div>
									</div>
									<!-- Para Parto-->
									<div id="parto">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Tipo Parto
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="par_tipo_parto" name="par_tipo_parto">
													<option value="par_tipo_parto">Seleccionar Tipo Parto</option>
													<?php 
														foreach($TipoPartos as $value){ ?>
															<option value="<?php echo $value->tpa_id ?>"><?php echo $value->tpa_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Estado Cria
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="par_estado_cria" name="par_estado_cria">
													<option value="par_estado_cria">Seleccionar Estado Cria</option>
													<?php 
														foreach($EstadoCrias as $value){ ?>
															<option value="<?php echo $value->etc_id ?>"><?php echo $value->etc_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Sexo Cria
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="par_sexo_cria" name="par_sexo_cria">
													<option value="par_sexo_cria">Seleccionar Sexo Cria</option>
													<?php 
														foreach($SexoCrias as $value){ ?>
															<option value="<?php echo $value->scr_id ?>"><?php echo $value->scr_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Servicio
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="par_servicio" name="par_servicio">
													<option value="par_servicio">Seleccionar Servicio</option>
													<?php 
														foreach($Servicios as $value){ ?>
															<option value="<?php echo $value->ser_id ?>"><?php echo $value->tipo_servicio ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>
									<!-- Para Aborto-->
									<div id="aborto">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Causa Aborto
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="abo_causaaborto" name="abo_causaaborto">
													<option value="abo_causaaborto">Seleccionar Causa Aborto</option>
													<?php 
														foreach($CausaAbortos as $value){ ?>
															<option value="<?php echo $value->cab_id ?>"><?php echo $value->cab_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>
									<!-- Para Celo-->
									<div id="celo">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Via Aplicacion
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="cel_via_aplicacion" name="cel_via_aplicacion">
													<option value="cel_via_aplicacion">Seleccionar Via Aplicacion</option>
													<?php 
														foreach($ViaAplicaciones as $value){ ?>
															<option value="<?php echo $value->vap_id ?>"><?php echo $value->vap_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												C.No Inseminal
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="cel_causa_no_inseminal" name="cel_causa_no_inseminal">
													<option value="cel_causa_no_inseminal">Seleccionar Causa No Insemial</option>
													<?php 
														foreach($CausaNoInse as $value){ ?>
															<option value="<?php echo $value->cni_id ?>"><?php echo $value->cni_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Med. Genital
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="cel_medicina_genital" name="cel_medicina_genital">
													<option value="cel_medicina_genital">Seleccionar Medicina Genital</option>
													<?php 
														foreach($MedGenital as $value){ ?>
															<option value="<?php echo $value->mdg_id ?>"><?php echo $value->mdg_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Servicio-->
									<div id="servicio">
										<input type="hidden" name="ser_personal" value="<?php echo $_SESSION['personal']; ?>">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Tipo Servicio
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="ser_tipo_servicio" name="ser_tipo_servicio">
													<option value="ser_tipo_servicio">Seleccionar Tipo Servicio</option>
													<?php 
														foreach($TipoServicios as $value){ ?>
															<option value="<?php echo $value->tps_id ?>"><?php echo $value->tps_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Reproductor
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="ser_reproductor" name="ser_reproductor">
													<option value="ser_reproductor">Seleccionar Reproductor </option>
													<?php 
														foreach($Reproductores as $value){ ?>
															<option value="<?php echo $value->rep_id ?>"><?php echo $value->rep_rp ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>									
									<!-- Para Muerte-->
									<div id="muerte">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Especif. Muerte
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="mue_espec_muerte" name="mue_espec_muerte">
													<option value="mue_espec_muerte">Seleccionar Especificacion Muerte</option>
													<?php 
														foreach($EspMuerte as $value){ ?>
															<option value="<?php echo $value->edm_id ?>"><?php echo $value->edm_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Venta-->
									<div id="venta">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Especif. Venta
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="ven_especificacion_venta" name="ven_especificacion_venta">
													<option value="ven_especificacion_venta">Seleccionar Especificacion Venta</option>
													<?php 
														foreach($EspVenta as $value){ ?>
															<option value="<?php echo $value->edv_id ?>"><?php echo $value->edv_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Secado-->
									<div id="secado">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Med.Cuartos M.
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="sec_med_cuartos_mamarios" name="sec_med_cuartos_mamarios">
													<option value="sec_med_cuartos_mamarios">Seleccionar Med. C. Mamarios</option>
													<?php 
														foreach($MedCuartos as $value){ ?>
															<option value="<?php echo $value->mdm_id ?>"><?php echo $value->mdm_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Rechazo-->
									<div id="rechazo">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Causa Rechazo
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="rec_causa_rechazo" name="rec_causa_rechazo">
													<option value="rec_causa_rechazo">Seleccionar Causa Rechazo</option>
													<?php 
														foreach($CausaRechazo as $value){ ?>
															<option value="<?php echo $value->car_id ?>"><?php echo $value->car_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Medicacion-->
									<div id="medicacion">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Via Aplicacion
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="mec_via_aplicacion" name="mec_via_aplicacion">
													<option value="mec_via_aplicacion">Seleccionar Via Aplicacion</option>
													<?php 
														foreach($ViaAplicaciones as $value){ ?>
															<option value="<?php echo $value->vap_id ?>"><?php echo $value->vap_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Medicamentos
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="mec_medicamentos" name="mec_medicamentos">
													<option value="mec_medicamentos">Seleccionar Medicamento</option>
													<?php 
														foreach($Medicamentos as $value){ ?>
															<option value="<?php echo $value->med_id ?>"><?php echo $value->med_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Indicaciones especiales-->
									<div id="indicaciones">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Ind. Especiales
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="iee_indicaciones_especiales" name="iee_indicaciones_especiales">
													<option value="iee_indicaciones_especiales">Seleccionar Indicaciones Especiales</option>
													<?php 
														foreach($IndicacionesEspeciales as $value){ ?>
															<option value="<?php echo $value->ide_id ?>"><?php echo $value->ide_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Enfermedad-->
									<div id="enfermedad">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Tipo Enfer.
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="enf_tipo_enfermedad" name="enf_tipo_enfermedad">
													<option value="enf_tipo_enfermedad">Seleccionar Tipo Enfermedad</option>
													<?php 
														foreach($TipoEnfermedad as $value){ ?>
															<option value="<?php echo $value->tpe_id ?>"><?php echo $value->tpe_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Via Aplicacion
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="enf_via_aplicacion" name="enf_via_aplicacion">
													<option value="enf_via_aplicacion">Seleccionar Via Aplicacion</option>
													<?php 
														foreach($ViaAplicaciones as $value){ ?>
															<option value="<?php echo $value->vap_id ?>"><?php echo $value->vap_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Medicamentos
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="enf_medicamentos" name="enf_medicamentos">
													<option value="enf_medicamentos">Seleccionar Medicamento</option>
													<?php 
														foreach($Medicamentos as $value){ ?>
															<option value="<?php echo $value->med_id ?>"><?php echo $value->med_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Analisis-->
									<div id="analisis">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Tipo Analisis
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="ana_tipo_analisis" name="ana_tipo_analisis">
													<option value="ana_tipo_analisis">Seleccionar Tipo Analisis</option>
													<?php 
														foreach($TipoAnalisis as $value){ ?>
															<option value="<?php echo $value->tpa_id ?>"><?php echo $value->tpa_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Resul. Analisis
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="ana_resultado_analisis" name="ana_resultado_analisis">
													<option value="ana_resultado_analisis">Seleccionar Resultado Analisis</option>
													<?php 
														foreach($ResultadoAnalisis as $value){ ?>
															<option value="<?php echo $value->res_id ?>"><?php echo $value->res_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	
									<!-- Para Tacto Rectal-->
									<div id="tactorectal">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Diag. Utero
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tar_diagnostico_utero" name="tar_diagnostico_utero">
													<option value="tar_diagnostico_utero">Seleccionar Diagnoostico Utero</option>
													<?php 
														foreach($DiagnosticoUtero as $value){ ?>
															<option value="<?php echo $value->dgu_id ?>"><?php echo $value->dgu_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Enf. Utero
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tar_enfermedad_utero" name="tar_enfermedad_utero">
													<option value="tar_enfermedad_utero">Seleccionar Enfermedad Utero</option>
													<?php 
														foreach($EnfermedadUtero as $value){ ?>
															<option value="<?php echo $value->efu_id ?>"><?php echo $value->efu_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Enf. Ovario
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tar_enfermedad_ovario" name="tar_enfermedad_ovario">
													<option value="tar_enfermedad_ovario">Seleccionar Enfermedad Ovario</option>
													<?php 
														foreach($EnfermedadOvario as $value){ ?>
															<option value="<?php echo $value->efo_id ?>"><?php echo $value->efo_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Med. Genital
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tar_medicina_genital" name="tar_medicina_genital">
													<option value="tar_medicina_genital">Seleccionar Medicina Genital</option>
													<?php 
														foreach($MedGenital as $value){ ?>
															<option value="<?php echo $value->mdg_id ?>"><?php echo $value->mdg_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Via Aplicacion
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tar_via_aplicacion" name="tar_via_aplicacion">
													<option value="tar_via_aplicacion">Seleccionar Via Aplicacion</option>
													<?php 
														foreach($ViaAplicaciones as $value){ ?>
															<option value="<?php echo $value->vap_id ?>"><?php echo $value->vap_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="form-field-1">
											Fecha Evento
										</label>
										<div class="col-sm-9">
											<input type="text" id="fechaevento" name="fechaevento" class="form-control">
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
<!-- Fin Contenido Calendario-->