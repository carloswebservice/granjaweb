<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Eventos - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row invoice">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar"></i>
                    <center>
                     	<button type="button" class="btn btn-default btn-xs" onclick="prevaño();">
                     		<i class="fa fa fa-arrow-circle-left"></i>
                     	</button>
                        Reporte Eventos - <span id="año"><?php echo $_SESSION['añoactual']; ?></span>
                        <button type="button" class="btn btn-default btn-xs" onclick="nextaño();">
                        	<i class="fa fa fa-arrow-circle-right"></i>
                        </button>
                    </center>
                    <div class="panel-tools">
                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
							<i class="fa fa-print"></i> Imprimir Reporte
						</a>
                    </div>
                </div>
                <div class="panel-body">
                	<div style="margin-top: -28px;"></div>
                    <table class="table table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th class="center">Evento</th>
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
                        		foreach ($Eventos['evento'] as $key => $evento) { ?> <tr>
                                    <td class="center" ><?php echo $evento['eve_descripcion'] ?></td>

                                    <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['enero']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Febrero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['febrero']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['marzo']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['abril']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['mayo']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['junio']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['julio']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['agosto']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['septiembre']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['octubre']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['noviembre']?>
		                                    </span>
	                                    <?php } ?>
	                                </td>
	                                 <!-- Enero -->
                                    <td class="sb-toggle center">
                                        <?php foreach ($evento['cantidad'] as $key => $cant) { ?>
		                                	<span style="font-weight: bold;">
		                                        <?php echo $cant['diciembre']?>
		                                    </span>
	                                    <?php } ?>
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
<!-- Fin Contenido Calendario-->