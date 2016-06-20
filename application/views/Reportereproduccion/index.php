<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Reproduccion - Granja Tarapoto
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
	                        Reporte Reproduccion - Animales
	                    </center>
	                    <div class="panel-tools">
	                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
								<i class="fa fa-print"></i> Imprimir Reporte
							</a>
	                    </div>
	                </div>
	                <div style="margin-top: -28px;"></div>
	                <div class="panel-body" id="informacion" style="width: 1080px;overflow-x: scroll;">
	                    <table class="table table-bordered table-condensed table-hover" id="tablacontenido" style="width: 1600px;">
	                        <thead>
	                        	<tr>
	                                <th class="center" colspan="19">Registro Reproduccion</th>
	                            </tr>
	                            <tr>
	                                <th class="center" colspan="12">Fecha Imp. <?php echo date('d-m-Y');?></th>
	                                <th class="center" colspan="7">Fecha Del X Al Y</th>
	                            </tr>
	                            <tr>
	                            	<th class="center" rowspan="2">#</th>
	                                <th class="center" rowspan="2">RP</th>
	                                <th class="center" rowspan="2">Nombre</th>
	                                <th class="center" rowspan="2">Nro Partos</th>
	                                <th class="center" rowspan="2">Nro Serv.</th>
	                                <th class="center" colspan="3">Ultimo Parto</th>
	                                <th class="center" colspan="4">Servicio</th>
	                                <th class="center" >Probable Parto</th>
	                                <th class="center" colspan="2">Controles Ultima Semana</th>
	                                <th class="center" rowspan="2">Dias Post Parto</th>
	                                <th class="center" >Alarma Inseminar</th>
	                                <th class="center" >Condicion Control</th>
	                                <th class="center" >Condicion Control</th>
	                            </tr>
	                            <tr>
	                                <th class="center">Fecha</th>	                                
	                                <th class="center">Sexo</th>
	                                <th class="center">Tip. Serv.</th>
	                                <th class="center">Fecha</th>
	                                <th class="center">Tipo</th>
	                                <th class="center">Reproductor</th>
	                                <th class="center">Dx Utero (Preñada)</th>
	                                <th class="center">Fecha</th>
	                                <th class="center">Total</th>
	                                <th class="center">Promedio</th>
	                                <th class="center"> >=40 dias post parto</th>
	                                <th class="center"> >=8,>=5,<=5 </th>
	                                <th class="center"> >=6,>=3,<=3 </th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<tr>
	                        		<?php 
	                        			foreach ($Reproductoras["reproductora"] as $value) { ?> <tr>
	                        				<td class="center"><?php echo $value["ani_id"] ?></td>
	                        				<td class="center"><?php echo $value["ani_rp"] ?></td>
	                        				<td class="center"><?php echo $value["ani_nombre"] ?></td>
	                        				<?php 
	                        					foreach ($value["partos"] as $val) { ?>
	                        						<td class="center"><?php echo $val["nropartos"] ?></td>
	                        					<?php }
	                        					foreach ($value["servicios"] as $val) { ?>
	                        						<td class="center"><?php echo $val["nroservicio"] ?></td>
	                        					<?php }
	                        					foreach ($value["ultimoparto"] as $val) { ?>
	                        						<td class="center"><?php echo $val["parult_fecha"] ?></td>
	                        						<td class="center"><?php echo $val["parult_sexo"] ?></td>
	                        						<td class="center"><?php echo $val["parult_tiposerv"] ?></td>
	                        					<?php }
	                        					foreach ($value["servicio"] as $val) { ?>
	                        						<td class="center"><?php echo $val["ser_fecha"] ?></td>
	                        						<td class="center"><?php echo $val["ser_tiposervicio"] ?></td>
	                        						<td class="center"><?php echo $val["ser_reproductor"] ?></td>
	                        					<?php }
	                        					foreach ($value["preñada"] as $val) { ?>
	                        						<td class="center">
	                        							<?php if ($val["dxutero"]==1) { echo "SI";
	                        							}else{ echo "NO"; } ?>
	                        						</td>
	                        						<td class="center"><?php echo $value["probableparto"] ?></td>
	                        					<?php }
	                        					foreach ($value["controles"] as $val) { ?>
	                        						<td class="center"><?php echo $val["suma"] ?></td>
	                        						<?php 
	                        							if($val["suma"]=="seca"){ $promed="seca"; ?>
	                        								<td class="center"> Seca </td>
	                        							<?php }else{ $promed=round($val["suma"]/7,2); ?>
	                        								<td class="center"><?php echo $promed ?></td>
	                        						<?php }
	                        					}
	                        				?>
	                        				<td class="center"><?php echo $value["diaspost"] ?></td>
	                        				<td class="center"><?php echo $value["alarmainseminar"] ?></td>
	                        				<?php 
	                        					if ($promed=="seca") { ?>
	                        						<td class="center"> seca </td>
	                        						<td class="center"> seca </td>
	                        					<?php }else{
	                        						//Primer Condicion
	                        						if ($promed>=8) { ?>
		                        						<td class="center"> 2 </td>
		                        					<?php }else{ 
		                        						if ($promed>=5 && $promed<8) { ?>
		                        							<td class="center"> 1 </td>
		                        						<?php }else{ ?>
		                        							<td class="center"> 0 </td>
		                        						<?php }
		                        					}
		                        					//Segunda Condicion
		                        					if ($promed>=6) { ?>
		                        						<td class="center"> 2 </td>
		                        					<?php }else{ 
		                        						if ($promed>=3 && $promed<6) { ?>
		                        							<td class="center"> 1 </td>
		                        						<?php }else{ ?>
		                        							<td class="center"> 0 </td>
		                        						<?php }
		                        					}
	                        					}
	                        				?>
	                        			</tr><?php }
	                        		?>
	                        	</tr>
	                        </tbody>
	                    </table>
	                </div>
	            </form>
            </div>
        </div>
    </div>

    <?php 
    	$junio=0;$julio=0;$agosto=0;$septiembre=0;$octubre=0;$noviembre=0;$diciembre=0;
    	$encontrol=0;$secas=0;
    	$pos_secas=0;$pos_menor25=0;$pos_menor50=0;$pos_mayor50=0;
    	$sumsecas=0; $mayor8=0;$menor5=0;$entre58=0; $sumatotal=0;$suma5=0;

	    foreach ($Reproductoras["reproductora"] as $value) {
	    	$fecha_probable= explode("-",$value["probableparto"]);
	    	if ($fecha_probable[1]==6) {
	    		$junio=$junio+1;
	    	}
	    	if ($fecha_probable[1]==7) {
	    		$julio=$julio+1;
	    	}
	    	if ($fecha_probable[1]==8) {
	    		$agosto=$agosto+1;
	    	}
	    	if ($fecha_probable[1]==9) {
	    		$septiembre=$septiembre+1;
	    	}
	    	if ($fecha_probable[1]==10) {
	    		$octubre=$octubre+1;
	    	}
	    	if ($fecha_probable[1]==11) {
	    		$noviembre=$noviembre+1;
	    	}
	    	if ($fecha_probable[1]==12) {
	    		$diciembre=$diciembre+1;
	    	}

	    	if ($value["diaspost"]=="seca") {
	    		$pos_secas=$pos_secas+1;
	    		$secas=$secas+1;
	    	}else{
	    		if ($value["diaspost"]<=25) {
	    			$pos_menor25=$pos_menor25+1;
	    		}else{
	    			if ($value["diaspost"]<=50) {
	    				$pos_menor50=$pos_menor50+1;
	    			}else{
	    				$pos_mayor50=$pos_mayor50+1;
	    			}
	    		}
	    		$encontrol=$encontrol+1;
	    	}
	    	foreach ($value["controles"] as $val) { 
	     		if($val["suma"]=="seca"){
	                $sumsecas = $sumsecas + 1;
	     		}else{
	                if ($val["suma"]>=8) {
	                    $mayor8 = $mayor8+1;
	                }else{
	                    if ($val["suma"]<=5) {
	                     	$menor5=$menor5+1;
	                     	$suma5=$suma5+$val["suma"];
	                    }else{
	                     	$entre58 = $entre58+1;
	                    }
	                }
	                $sumatotal=$sumatotal+$val["suma"];
	     		}
	    	}
	    }
	?>

    <div class="row">
    	<div class="col-md-3">
    		<div class="panel panel-default">
	            <div class="panel-heading">
	            	<i class="fa fa-calendar"></i>
                    Pariciones 
                    <select class="form-control" id="paricion" name="paricion" style="margin-left:100px;margin-top:-29.5px;width: 80px;" >
                    	<option value="2016">2016</option>
                    	<option value="2017">2017</option>
                    	<option value="2018">2018</option>
                    </select>
	            </div>
	            <div class="panel-body" style="padding:0px;">
	                <table class="table table-bordered table-condensed table-hover">
	                    <thead>
	                        <tr>
	                            <th class="center">Mes</th>	                                
	                            <th class="center">Cantidad</th>
	                        </tr>
	                    </thead>
	                    <tbody id="actualizarpariciones">
	                       	<tr>
	                        	<td class="center"> Jun 2016 </td>
	                        	<td class="center"> <?php echo $junio; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<td class="center"> Jul 2016 </td>
	                        	<td class="center"> <?php echo $julio; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<td class="center"> Ago 2016 </td>
	                        	<td class="center"> <?php echo $agosto; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<td class="center"> Sep 2016 </td>
	                        	<td class="center"> <?php echo $septiembre; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<td class="center"> Oct 2016 </td>
	                        	<td class="center"> <?php echo $octubre; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<td class="center"> Nov 2016 </td>
	                        	<td class="center"> <?php echo $noviembre; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<td class="center"> Dic 2016 </td>
	                        	<td class="center"> <?php echo $diciembre; ?></td>
	                       	</tr>
	                       	<tr>
	                        	<th class="center"> Total </th>
	                        	<th class="center"> <?php echo $junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre; ?></th>
	                       	</tr>
	                    </tbody>
	                </table>
	            </div>
	            <div style="margin-top: -8px;"></div>
            </div>
    	</div>
    	<div class="col-md-2">
    		<div class="panel panel-default">
	            <div class="panel-heading">
	            	<i class="fa fa-picture-o"></i>
	                Resumen                   
	            </div>
	            <div class="panel-body" style="padding: 0px;">
	                <table class="table table-bordered table-condensed table-hover">
	                    <thead>
	                        <tr>
	                            <th class="center">Condicion</th>	                                
	                            <th class="center">Cantidad</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                       	<tr> 
	                        	<td class="center">En Control</td>
	                        	<td class="center"><?php echo $encontrol; ?></td>
	                       	</tr>
	                       	<tr> 
	                        	<td class="center">Secas</td>
	                        	<td class="center"><?php echo $secas; ?></td>
	                       	</tr>
	                       	<tr> 
	                        	<th class="center"> Total</th>
	                        	<th class="center"><?php echo $encontrol+$secas; ?></th>
	                       	</tr>
	                    </tbody>
	                </table>
	            </div>
	            <div style="margin-top: -8px;"></div>
            </div>
    	</div>

    	<div class="col-md-2">
    		<div class="panel panel-default">
	            <div class="panel-heading">
	            	<i class="fa fa-cog"></i>
	                Dias Post Parto                   
	            </div>
	            <div class="panel-body" style="padding: 0px;">
	                <table class="table table-bordered table-condensed table-hover">
	                    <tbody>
	                       	<tr>
	                        	<td class="center"> Secas </td>
	                        	<td class="center"><?php echo $pos_secas; ?></td>
	                        </tr>
	                        <tr>
	                        	<td class="center"> <= 25 </td>
	                        	<td class="center"><?php echo $pos_menor25; ?></td>
	                        </tr>
	                        <tr> 
	                        	<td class="center"> <= 50 </td>
	                        	<td class="center"><?php echo $pos_menor50; ?></th>
	                       	</tr>
	                       	<tr> 
	                        	<td class="center"> > 50 </td>
	                        	<td class="center"><?php echo $pos_mayor50; ?></td>
	                       	</tr>
	                       	<tr> 
	                        	<th class="center"> Total </th>
	                        	<th class="center"><?php echo $pos_secas+$pos_menor25+$pos_menor50+$pos_mayor50; ?></th>
	                       	</tr>
	                    </tbody>
	                </table>
	            </div>
	            <div style="margin-top: -8px;"></div>
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="panel panel-default">
	            <div class="panel-heading">
	            	<i class="fa fa-reorder"></i>
	                Controles                    
	            </div>
	            <div class="panel-body" id="informacion1" style="padding: 0px;">
	                <table class="table table-bordered table-condensed table-hover">
	                    <thead>
	                        <tr>
	                            <th class="center">Parametro</th>	                                
	                            <th class="center">Total</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                        	<td class="center">Secas</td>
	                        	<td class="center"><?php echo $sumsecas; ?></td>
	                        </tr>
	                        <tr>
	                        	<td class="center"> >= 8 </td>
	                        	<td class="center"><?php echo $mayor8; ?></td>
	                        </tr>
	                        <tr>
	                        	<td class="center"> > 5 y < 8 </td>
	                        	<td class="center"><?php echo $entre58; ?></td>
	                        </tr>
	                        <tr>
	                        	<td class="center"> <= 5 </td>
	                        	<td class="center"><?php echo $menor5; ?></td>
	                        </tr>
	                        <tr> 
	                        	<th class="center"> Total</th>
	                        	<th class="center"><?php echo $sumsecas+$mayor8+$entre58+$menor5; ?></th>
	                       	</tr>
	                    </tbody>
	                </table>
	            </div>
	            <div style="margin-top: -8px;"></div>
            </div>
    	</div>
    	<div class="col-md-2">
    		<div class="panel panel-default">
	            <div class="panel-heading">
	            	<i class="fa fa-bar-chart-o"></i>
	                Total Controles                   
	            </div>
	            <div class="panel-body" id="informacion1" style="padding: 0px;">
	                <table class="table table-bordered table-condensed table-hover">
	                    <tbody>
	                       	<tr>
	                        	<td class="center"> Todas </td>
	                        	<td class="center"><?php echo $sumatotal; ?></td>
	                        </tr>
	                        <tr>
	                        	<td class="center"> <= 5 </td>
	                        	<td class="center"><?php echo $suma5; ?></td>
	                        </tr>
	                        <tr> 
	                        	<th class="center"> Diferencia</th>
	                        	<th class="center"><?php echo $sumatotal-$suma5; ?></th>
	                       	</tr>
	                    </tbody>
	                </table>
	            </div>
	            <div style="margin-top: -8px;"></div>
            </div>
    	</div>
    </div>
<!-- Fin Contenido Calendario-->