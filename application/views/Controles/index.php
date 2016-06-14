<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Controles - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row invoice">
        <div class="col-sm-12">
            <div class="panel panel-default">
            	<form id="form_controles"> 
	                <div class="panel-heading">
	                    <i class="fa fa-calendar"></i>
	                    <center>
	                        Controles - Animales
	                    </center>
	                    <div class="panel-tools">
	                    	<input type="text" class="form-control" id="fechacontrol" name="con_fecha" style="margin-top: -5px;height: 27px; width: 200px;">
	                    </div>
	                </div>
	                <div class="panel-body">
	                	<div style="margin-top: -28px;"></div>
	                    <table class="table table-bordered table-condensed table-hover">
	                        <thead>
	                            <tr>
	                                <th class="center">Nro</th>
	                                <th class="center">RP Animal</th>
	                                <th class="center">Nombre</th>
	                                <th class="center">Control 1</th>
	                                <th class="center">Control 2</th>
	                            </tr>
	                        </thead>
	                        <tbody id="informacion">
	                        	<?php
	                        		foreach ($controles as $value) {?> <tr>
	                        			<input type="hidden" name="con_animal[]" value="<?php echo $value->ani_id?>">
	                        			<td><?php echo $value->ani_id?></td>
	                        			<td><?php echo $value->ani_rp?></td>
	                        			<td><?php echo $value->ani_nombre?></td>
	                        			<td><input type="text" class="form-control" name="con_control1[]" value="0" onkeypress="return solo_decimales(event)"> </td>
	                        			<td><input type="text" class="form-control" name="con_control2[]" value="0" onkeypress="return solo_decimales(event)"> </td> </tr>
	                        		<?php }
	                        	?>
	                        	<tr>
	                        		<td colspan="3"> <center> TOTALES </center></td>
	                        		<td id="control1">0</td>
	                        		<td id="control2">0</td>
	                        	</tr>
	                        </tbody>
	                    </table>
	                    <button type="button" class="btn btn-teal" onclick="guardar()"> 
	                    	<i class="fa fa-save"></i> Guadar Cambios
	                    </button>
	                </div>
	            </form>
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

	<script type="text/javascript">
		function solo_decimales(e){
			key = e.keyCode || e.which;
			tecla = String.fromCharCode(key).toLowerCase();
			letras = "0123456789.";
			especiales = "8-37-39-46";

			tecla_especial = false
			for(var i in especiales){
				if(key == especiales[i]){
				    tecla_especial = true;
				    break;
				}
			}

			if(letras.indexOf(tecla)==-1 && !tecla_especial){
				return false;
			}
		}
	</script>
<!-- Fin Contenido Calendario-->