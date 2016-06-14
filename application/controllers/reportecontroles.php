<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reportecontroles extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["reportecontroles.js","highcharts.js"]);
		parent::index($view,$data);
	}

	public function listar(){
		$animales["animal"] = $this->modelo_base->MostrarArray(" select distinct(a.ani_id), a.* from animales as a inner join control as c on(a.ani_id=c.con_animal)");

		foreach ($animales["animal"] as $key => $value) {
			$fechas = $this->modelo_base->MostrarArray("select c.* from animales as a inner join control as c on(a.ani_id=c.con_animal) where a.ani_id=".$value["ani_id"]." and c.con_fecha between '".$_POST['fechainicio']."' and '".$_POST['fechafin']."' order by c.con_fecha");
			$animales["animal"][$key]["controles"]=$fechas;
		}		

		$html = "<table class='table table-bordered table-condensed table-hover'>";
		$html .= "<thead>";
		$html .= "<tr>";
		$html .=    "<th class='center' rowspan='2'>RP Animal</th>";
		$html .=    "<th class='center' rowspan='2'>Nombre</th>";
		foreach ($fechas as $control) {
		    $html .="<th class='center' colspan='2'>".$control["con_fecha"]."</th>";
		}
		$html .=    "<th class='center' rowspan='2'>Total</th>";
		$html .=    "<th class='center' rowspan='2'>Promedio</th>";
		$html .= "</tr>";
	    $html .= "<tr>";
	    foreach ($fechas as $control) {
		    $html .= "<th class='center'>C1</th>";
	    	$html .= "<th class='center'>C2</th>";
		}
	    $html .= "</tr>";
	    $html .= "</thead>";
	    $html .= "</body>";
	    $suma2=0; $sumascol = array();
	    if (count($fechas)==0) {
	    	$cantfechas=1;
	    }else{
	    	$cantfechas = count($fechas);
	    }
		foreach ($animales["animal"] as $value) {
			$suma1=0;
			$html .="<tr>";
	        $html .="<td  class='center'onclick='grafico(".$value['ani_id'].");'> ".$value['ani_rp']." </td>";
	        $html .="<td  class='center'onclick='grafico(".$value['ani_id'].");'> ".$value['ani_nombre']."</td>";
	        foreach ($value["controles"] as $control) {
	        	$suma1=$suma1+$control['con_control1']+$control['con_control2'];
	        	$html .="<td class='center'>".$control['con_control1']."</td>";
	        	$html .="<td class='center'>".$control['con_control2']."</td>";
	        }
	        $html .="<td class='center' style='background:#f2f2f2;'>".$suma1."</td>";
	        $html .="<td class='center' style='background:#f2f2f2;'>".round(($suma1/$cantfechas),2)."</td>";	       	
	        $html .='</tr>'; $suma2 = $suma2 + $suma1;
		}
		$html .= "<tr style='background:#f2f2f2;'>";
			$html .="<td  class='center' colspan='".(2+(count($fechas)*2))."'> Totales </td>";
	        $html .="<td  class='center'> ".$suma2." </td>";
	        $html .="<td  class='center'> ".round(($suma2/$cantfechas),2)."</td>";
	    $html .= "</tr>";
		$html .= "</body>";
		$html .= "</table>";
	    echo $html;
	}

	function grafico(){
		$animal = $this->modelo_base->MostrarArray("select *from animales where ani_id=".$_POST["animal"]);

		$grafico = $this->modelo_base->MostrarArray("
			select c.con_fecha as name, SUM(c.con_control1+c.con_control2) as y from animales as a inner join control as c on(a.ani_id=c.con_animal) where a.ani_id=".$_POST["animal"]." and c.con_fecha between '".$_POST['fechaini']."' and '".$_POST['fechaf']."' group by c.con_fecha order by c.con_fecha");
		
		$data = array();
	 	$grafic = array();
	 	$sumatotal = 0; $numerofechas = 0;

		foreach($grafico as $key => $value){
		 	$grafic[$key]["name"] = $value["name"];
			$grafic[$key]["y"] = (Double)$value["y"];
			$sumatotal = $sumatotal + (Double)$value["y"]; $numerofechas = $numerofechas +1;
		}
		$data["informacion"] = "Suma Total = ".round($sumatotal,1)." | Numero Fechas = ".$numerofechas." | PROMEDIO = ".round(($sumatotal/$numerofechas),2);
		$data["mensajepricipal"] = "Reporte Del Animal ".$animal[0]["ani_nombre"]." - Rango (De ".$_POST['fechaini']." Hasta ".$_POST['fechaf'].")";
		$data["mensaje"] = "RP Animal: ".$animal[0]["ani_rp"].", Nombre Animal: ".$animal[0]["ani_nombre"].", Fecha Nacimiento: ".$animal[0]["ani_fechanac"];
		$data["grafico"] = $grafic;
		echo json_encode($data);
	}

	function grafico1(){
		$animal = $this->modelo_base->MostrarArray("select *from animales where ani_id=".$_POST["animal"]);

		$grafico = $this->modelo_base->MostrarArray("
			select c.con_fecha as name, SUM(c.con_control1+c.con_control2) as y from animales as a inner join control as c on(a.ani_id=c.con_animal) where a.ani_id=".$_POST["animal"]." and c.con_fecha between '".$_POST['fechaini']."' and '".$_POST['fechaf']."' group by c.con_fecha order by c.con_fecha");
		
		$data = array();
	 	$graficofechas = array(); $graficodatos = array();
	 	$sumatotal = 0; $numerofechas = 0;

		foreach($grafico as $key => $value){
		 	$graficofechas[] = $value["name"];
			$graficodatos[] = (Double)$value["y"];
			$sumatotal = $sumatotal + (Double)$value["y"]; $numerofechas = $numerofechas +1;
		}
		$data["informacion"] = "Suma Total = ".round($sumatotal,1)." | Numero Fechas = ".$numerofechas." | PROMEDIO = ".round(($sumatotal/$numerofechas),2);
		$data["mensajepricipal"] = "Reporte Del Animal ".$animal[0]["ani_nombre"]." - Rango (De ".$_POST['fechaini']." Hasta ".$_POST['fechaf'].")";
		$data["mensaje"] = "RP Animal: ".$animal[0]["ani_rp"].", Nombre Animal: ".$animal[0]["ani_nombre"].", Fecha Nacimiento: ".$animal[0]["ani_fechanac"];
		$data["graficofechas"] = $graficofechas;
		$data["graficodatos"] = $graficodatos;
		echo json_encode($data);
	}
}