<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Eventos Animal - Granja Tarapoto
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
	                        Reporte Eventos Animal - Animales
	                    </center>
	                    <div class="panel-tools">
	                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
								<i class="fa fa-print"></i> Imprimir Reporte
							</a>
	                    </div>
	                </div>
	                <div style="margin-top: -28px;"></div>
	                <div class="panel-body" id="informacion">
	                	<div class="row">
	                		<?php 
	                			foreach ($animales["animal"] as $value) { ?>
	                				<div class="col-md-4">
			                			<table class="table table-bordered table-hover">
					                        <thead>
					                        	<tr>
					                                <th class="center" colspan="2">
					                                	RP : <?php echo $value["ani_rp"] ?> <br>
					                                	Animal : <?php echo $value["ani_nombre"] ?>
					                                </th>
					                            </tr>
					                            <tr>
					                                <th class="center"> Fecha </th>
					                                <th class="center"> Evento </th>
					                            </tr> 
					                        </thead>
					                        <tbody>
					                        	<?php 
					                        		foreach ($value["evento"] as $val) { ?>
					                        			<tr>
							                                <td class="center"> <?php echo $val["fecha"] ?> </td>
							                                <td class="center"> <?php echo $val["evento"] ?> </td>
							                            </tr>
					                        		<?php }
					                        	?>
					                        </tbody>
					                    </table>
			                		</div>
	                			<?php }
	                		?>
	                	</div>
	                </div>
	            </form>
            </div>
        </div>
    </div>
<!-- Fin Contenido Calendario-->