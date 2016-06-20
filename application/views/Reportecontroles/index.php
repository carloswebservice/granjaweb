<!-- Contenido Calendario-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-calendar"></i> Reporte Controles - Granja Tarapoto
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
	                        <input type="text" class="form-control date-range" id="fecharango" style="margin-top: -5px;height: 27px; width: 250px;">
	                    </center>
	                    <div class="panel-tools">
	                    	<a onclick="listarahora();" class="btn btn-xs btn-danger hidden-print">
								<i class="fa fa-list"></i> Listar Ahora
							</a>
	                    	<a onclick="imprimir();" class="btn btn-xs btn-teal hidden-print">
								<i class="fa fa-print"></i> Imprimir Reporte
							</a>
	                    </div>
	                </div>
	                <div style="margin-top: -28px;"></div>
	                <div class="panel-body" id="informacion" style="width: 1108px;overflow-x: scroll;">
	                    <table class="table table-bordered table-condensed table-hover">
	                        <thead>
	                            <tr>
	                                <th class="center" rowspan="2">RP Animal</th>
	                                <th class="center" rowspan="2">Nombre</th>
	                                <th class="center" colspan="2">Fecha</th>
	                                <th class="center" rowspan="2">Total</th>
	                                <th class="center" rowspan="2">Promedio</th>
	                            </tr>
	                            <tr>
	                                <th class="center">Control 1</th>
	                                <th class="center">Control 2</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<tr> 
	                        		<td class="center" colspan="6">Seleccione Rango De Fechas - Sin Animales</td>
	                        	</tr>
	                        </tbody>
	                    </table>
	                </div>
	            </form>
            </div>
        </div>
    </div>

    <!-- Grafico Barras-->
	<div id="grafico" class="modal fade" data-width="800" style="display: none;">
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto"> </div>
		<div style="height: 1px; width: 100%; background: #f2f2f2;"></div> <br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o"></i>
					<p id="info"></p> 
				<div class="panel-tools" style="margin-top: -6px;">
					<button type="button" data-dismiss="modal" class="btn btn-danger hidden-print">
						<i class="fa fa-times"></i> Listo! Cerrar
					</button>
					<button type="button" onclick="grafico1()" class="btn btn-primary hidden-print">
						<i class="fa fa-times"></i> Ver Lineal
					</button>
					<button type="button" onclick="imprimir1()" class="btn btn-info hidden-print">
						<i class="fa fa-print"></i> Imprimir
					</button>
				</div>
			</div>
		<div>
	</div>
	<!-- Grafico Lineal-->
	<div id="grafico1" class="modal fade" data-width="800" style="display: none;">
		<div id="container1" style="width: 800px; height: 400px; margin: 0 auto"> </div>
		<div style="height: 1px; width: 100%; background: #f2f2f2;"></div> <br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o"></i>
					<p id="info1"></p> 
				<div class="panel-tools" style="margin-top: -6px;">
					<button type="button" data-dismiss="modal" class="btn btn-danger hidden-print">
						<i class="fa fa-times"></i> Listo! Cerrar
					</button>
					<button type="button" onclick="imprimir1()" class="btn btn-info hidden-print">
						<i class="fa fa-print"></i> Imprimir
					</button>
				</div>
			</div>
		<div>
	</div>
<!-- Fin Contenido Calendario-->

