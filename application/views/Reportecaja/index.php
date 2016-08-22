<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Caja - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row invoice">
        <div class="col-sm-12" id="tablareporte">
            <div class="panel panel-default">
            	<form id="form_caja"> 
	                <div class="panel-heading">
	                    <i class="fa fa-calendar"></i>
	                    <center>
	                        Reporte Caja - Lista De Todos Los Movimientos Realizados
	                    </center>
	                    <div class="panel-tools">
	                    	<a onclick="nuevo();" class="btn btn-xs btn-warning hidden-print">
								<i class="fa fa-print"></i> Nuevo Registro
							</a>
	                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
								<i class="fa fa-print"></i> Imprimir Reporte
							</a>
	                    </div>
	                </div>
	                <div class="panel-body" id="informacion">
	                    <table class="table table-bordered table-condensed">
	                    	<thead>
	                    		<tr>
		                    		<th class="center" rowspan="2">Fecha</th>
		                    		<th class="center" rowspan="2">Cant.</th>
		                    		<th class="center" rowspan="2">Tipo</th>
		                    		<th class="center" rowspan="2">Estado</th>
		                    		<th class="center" rowspan="2">Descripcion</th>
		                    		<th class="center" rowspan="2">Ingreso</th>
		                    		<th class="center" rowspan="2">Saldo</th>
		                    		<th class="center" colspan="4">Egreso</th>
		                    		<th class="center" rowspan="2">Saldo Total</th>
	                    		</tr>
	                    		<tr>
		                    		<th class="center">Compra</th>
		                    		<th class="center">Medicina</th>
		                    		<th class="center">Transporte</th>
		                    		<th class="center">Total</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    		<?php 
	                    			foreach ($caja as $value) { ?>
	                    				<tr>
	                    					<input type="hidden" name="idcaja[]" value="<?php echo $value["idcaja"]?> ">
				                    		<td class="center"> 
				                    			<input type="text" data-date-format="yyyy-mm-dd"class="form-control date-picker cajainput fecha" value="<?php echo $value["fecha"]?>" name="fecha[]">
				                    		</td>
				                    		<td class="center">
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["cantidad"]?>" name="cantidad[]">
				                    		</td>
				                    		<td class="center"> 
				                    			<select class="form-control cajainput tipo" id="tipocaja" name="tipo[]">
				                    				<option value="tipo"></option>
				                    				<?php 
				                    					if ($value["tipo"]=="Mayor") { ?>
				                    						<option value="Mayor" selected="true"> Mayor</option>
				                    						<option value="Menor" > Menor</option>
				                    					<?php }else{ 
				                    						if ($value["tipo"]=="Menor") { ?>
				                    							<option value="Menor" selected="true">Menor</option>
				                    							<option value="Mayor"> Mayor</option>
				                    						<?php }else{ ?>
				                    							<option value="Menor"> Menor</option>
				                    							<option value="Mayor"> Mayor</option>
				                    						<?php }
				                    					}
				                    				?>
				                    			</select>
				                    		</td>
				                    		<td class="center"> 
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["estado"]?>" name="estado[]"> 
				                    		</td>
				                    		<td class="center"> 
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["descripcion"]?>" name="descripcion[]">
				                    		</td>
				                    		<td class="center"> 
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["ingreso"]?>" name="ingreso[]">
				                    		</td>
				                    		<td class="center"> <?php echo $value["saldo"]?> </td>
				                    		<td class="center"> 
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["compra"]?>" name="compra[]"> 
				                    		</td>
				                    		<td class="center"> 
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["medicina"]?>" name="medicina[]"> 
				                    		</td>
				                    		<td class="center"> 
				                    			<input type="text" class="form-control cajainput" value="<?php echo $value["transporte"]?>" name="transporte[]">
				                    		</td>
				                    		<td class="center"> <?php echo $value["total"]?> </td>
				                    		<td class="center"> <?php echo $value["saldo_total"]?> </td>
			                    		</tr>
	                    			<?php }
	                    		?>
	                    	</tbody>
	                    </table>
	                </div>
	            </form>
            </div>
        </div>
    </div>

    <!-- Mensaje Corestado_cria-->
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

