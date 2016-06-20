<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Animales - Granja Tarapoto
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
	                        Reporte General - Animales
	                    </center>
	                    <div class="panel-tools">
	                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
								<i class="fa fa-print"></i> Imprimir Reporte
							</a>
	                    </div>
	                </div>
	                <div style="margin-top: -28px;"></div>
	                <div class="panel-body" id="informacion">
	                    <table class="table table-bordered table-condensed table-hover">
	                        <thead>
	                            <tr>
	                            	<th class="center" rowspan="2">#</th>
	                                <th class="center" rowspan="2">RP</th>
	                                <th class="center" rowspan="2">Nombre</th>
	                                <th class="center" colspan="2">Madre</th>
	                                <th class="center" colspan="2">Padre</th>
	                                <th class="center" rowspan="2">Sexo</th>
	                                <th class="center" rowspan="2">Fecha Nac.</th>
	                                <th class="center" rowspan="2">Edad</th>
	                                <th class="center" rowspan="2">Descripcion</th>
	                                <th class="center" rowspan="2">Estado</th>
	                            </tr>
	                            <tr>
	                                <th class="center">RP</th>	                                
	                                <th class="center">Nombre</th>
	                                <th class="center">RP</th>	                                
	                                <th class="center">Nombre</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php 
	                        		foreach ($animales["animal"] as $value) { ?> <tr>
	                        			<td class="center"><?php echo $value["ani_id"]?></td>
	                        			<td class="center"><?php echo $value["ani_rp"]?></td>
	                        			<td class="center"><?php echo $value["ani_nombre"]?></td>
	                        			<?php 
	                        				if (count($value["madre"])==0) { ?>
	                        					<td class="center"><?php echo $value["ani_madre"]?></td>
	                        					<td class="center">Sin Nombre</td>
	                        				<?php }else{
	                        					foreach ($value["madre"] as $val) { ?>
		                        					<td class="center"><?php echo $val["ani_rp"]?></td>
		                        					<td class="center"><?php echo $val["ani_nombre"]?></td>
		                        				<?php }
	                        				}
	                        				foreach ($value["padre"] as $val) { ?>
	                        					<td class="center"><?php echo $val["rep_rp"]?></td>
	                        					<td class="center"><?php echo $val["rep_raza"]?></td>
	                        				<?php }
	                        			?>
	                        			<td class="center"><?php echo $value["ani_sexo"]?></td>
	                        			<td class="center"><?php echo $value["ani_fechanac"]?></td>
	                        			<td class="center">
	                        				<?php 
	                        					$a=0;$m=0;
												$dif=strtotime(date('Y-m-d')) - strtotime($value["ani_fechanac"]); 
												$dias= (int)(round($dif / 86400));
												while ($dias >= 365) {
													$a=$a+1; $dias = $dias - 365;
												}
												while ($dias >= 30) {
													$m=$m+1; $dias = $dias - 30;
												}
												if ($a!=0) {
													echo $a .' Años, '.$m.' Meses y '.$dias.' Dias';
												}else{
													echo $m.' Meses y '.$dias.' Dias';
												}
											?>
	                        			</td>
	                        			<td class="center"><?php echo $value["ani_descripcion"]?></td>
	                        			<td class="center">
	                        				<?php 
	                        					if($value["ani_estado"]==1){
	                        						echo "Vivo";
	                        					}else{
	                        						echo "Muerto";
	                        					}
	                        				?>
	                        			</td>
	                        		</tr><?php }
	                        	?>
	                        </tbody>
	                    </table>
	                </div>
	            </form>
            </div>
        </div>
    </div>
<!-- Fin Contenido Calendario-->