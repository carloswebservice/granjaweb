<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reportereproduccion extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";
		
		$Reproductoras['reproductora']=$this->modelo_base->MostrarArray(
			"select ani_id,ani_rp, ani_nombre from animales where ani_estado=1"
		);
		foreach ($Reproductoras['reproductora'] as $key => $value) {
			$parto = $this->modelo_base->MostrarArray("select count(par_animal) as nropartos from parto where par_animal=".$value["ani_id"]);
			$Reproductoras['reproductora'][$key]["partos"] = $parto;
		}
		foreach ($Reproductoras['reproductora'] as $key => $value) {
			$parto = $this->modelo_base->MostrarArray("select MAX(par_fecha) as fecha from parto where par_animal=".$value["ani_id"]);
			if ($parto[0]["fecha"]!="") {
				$parto = $this->modelo_base->MostrarArray("select p.par_fecha as parult_fecha, sc.scr_abreviatura as parult_sexo,ts.tps_abreviatura as parult_tiposerv from parto as p inner join servicio as s on(p.par_servicio=s.ser_id) inner join tipo_servicio as ts on (s.ser_tipo_servicio=ts.tps_id) inner join sexo_cria as sc on(p.par_sexo_cria=sc.scr_id) where p.par_fecha='".$parto[0]["fecha"]."' and p.par_animal=".$value["ani_id"]);
			}else{
				$parto = $this->modelo_base->MostrarArray("select ' ' as parult_fecha, ' ' as parult_sexo,' ' as parult_tiposerv");
			}		
			$Reproductoras['reproductora'][$key]["ultimoparto"] = $parto;
		}
		foreach ($Reproductoras['reproductora'] as $key => $value) {
			$servicio = $this->modelo_base->MostrarArray("select MAX(ser_fecha) as fecha from servicio where ser_animal=".$value["ani_id"]);
			$probableparto = date ( 'Y-m-d' , strtotime ('+9 month',strtotime ($servicio[0]["fecha"])));
			if ($servicio[0]["fecha"]!="") {
				$servicio = $this->modelo_base->MostrarArray("select s.ser_fecha, ts.tps_abreviatura as ser_tiposervicio,r.rep_raza as ser_reproductor from animales as a inner join servicio as s on(a.ani_id=s.ser_animal) inner join tipo_servicio as ts on (s.ser_tipo_servicio=ts.tps_id) inner join reproductor as r on(s.ser_reproductor=r.rep_id)where s.ser_fecha='".$servicio[0]["fecha"]."' and s.ser_animal=".$value["ani_id"]);
			}else{
				$servicio = $this->modelo_base->MostrarArray("select ' ' as ser_fecha, ' ' as ser_tiposervicio, ' ' as ser_reproductor");
			}				
			$Reproductoras['reproductora'][$key]["servicio"] = $servicio;
			$Reproductoras['reproductora'][$key]["probableparto"] = $probableparto;
		}
		foreach ($Reproductoras['reproductora'] as $key => $value) {
			$preñada = $this->modelo_base->MostrarArray("select MAX(tar_fecha) as fecha from tacto_rectal where tar_animal=".$value["ani_id"]);
			if ($preñada[0]["fecha"]!="") {
				$preñada = $this->modelo_base->MostrarArray("select tar_diagnostico_utero as dxutero from tacto_rectal where tar_fecha='".$preñada[0]["fecha"]."' and tar_animal=".$value["ani_id"]);
			}else{
				$preñada = $this->modelo_base->MostrarArray("select 0 as dxutero");				
			}
			$Reproductoras['reproductora'][$key]["preñada"] = $preñada;
		}
		foreach ($Reproductoras['reproductora'] as $key => $value) {
			$secas = $this->modelo_base->MostrarArray("select *from secado as s inner join animales as a on(a.ani_id=s.sec_animal) where s.sec_estado=1 and a.ani_id=".$value["ani_id"]);
			if (count($secas)==0) {
				$ultimodia = date('Y-m-d'); 
				$primerdia=date ( 'Y-m-d' , strtotime ('-7 day' , strtotime ($ultimodia)));
				$sumcontroles = $this->modelo_base->MostrarArray("select SUM(c.con_control1+c.con_control2) as suma from animales as a inner join control as c on(a.ani_id=c.con_animal) where a.ani_id=".$value["ani_id"]." and c.con_fecha between '".$primerdia."' and '".$ultimodia."'");
			}else{
				$sumcontroles = $this->modelo_base->MostrarArray("select 'seca' as suma");				
			}
			$Reproductoras['reproductora'][$key]["controles"] = $sumcontroles;
		}
		foreach ($Reproductoras['reproductora'] as $key => $value) {
			$secas = $this->modelo_base->MostrarArray("select *from secado as s inner join animales as a on(a.ani_id=s.sec_animal) where s.sec_estado=1 and a.ani_id=".$value["ani_id"]);
			if (count($secas)==0) {
				$diaspost = $this->modelo_base->MostrarArray("select MAX(par_fecha) as fecha from parto where par_animal=".$value["ani_id"]);
				if ($diaspost[0]["fecha"]!="") {
					$diff = strtotime(date('Y-m-d')) - strtotime($diaspost[0]["fecha"]); 
					$diaspost = round($diff / 86400); 
				}else{
					$diaspost = 0;
				}
				if ($diaspost>=40) {
					$alarmainseminar="Inseminar !!";
				}else{
					$alarmainseminar="";
				}
			}else{
				$diaspost = "seca";
				$alarmainseminar="seca";
			}
			$Reproductoras['reproductora'][$key]["diaspost"] = $diaspost;
			$Reproductoras['reproductora'][$key]["alarmainseminar"] = $alarmainseminar;
		}

		//echo "<pre>";
		//print_r($resumen); exit();
		$data["Reproductoras"] = $Reproductoras;
		$data["scripts"] = $this->cargar_js(["reportereproduccion.js"]);
		parent::index($view,$data);
	}

	public function pariciones(){
		$animales=$this->modelo_base->MostrarArray(
			"select ani_id,ani_rp, ani_nombre from animales where ani_estado=1"
		);
		$probables = array();
		$enero=0;$febrero=0;$marzo=0;$abril=0;$mayo=0;$junio=0;$julio=0;$agosto=0;$septiembre=0;$octubre=0;
		$noviembre=0;$diciembre=0;
		foreach ($animales as $key => $value) {
			$servicio = $this->modelo_base->MostrarArray("select MAX(ser_fecha) as fecha from servicio where ser_animal=".$value["ani_id"]);
			$probableparto = date ( 'Y-m-d' , strtotime ('+9 month',strtotime ($servicio[0]["fecha"])));		
			$fecha_probable= explode("-",$probableparto);
			$probables[] = $fecha_probable[1];
			if ($fecha_probable[1]==1 && $fecha_probable[0]==$_POST["anio"]) {
	    		$enero=$enero+1;
	    	}
	    	if ($fecha_probable[1]==2 && $fecha_probable[0]==$_POST["anio"]) {
	    		$febrero=$febrero+1;
	    	}
	    	if ($fecha_probable[1]==3 && $fecha_probable[0]==$_POST["anio"]) {
	    		$marzo=$marzo+1;
	    	}
	    	if ($fecha_probable[1]==4 && $fecha_probable[0]==$_POST["anio"]) {
	    		$abril=$abril+1;
	    	}
	    	if ($fecha_probable[1]==5 && $fecha_probable[0]==$_POST["anio"]) {
	    		$mayo=$mayo+1;
	    	}
			if ($fecha_probable[1]==6 && $fecha_probable[0]==$_POST["anio"]) {
	    		$junio=$junio+1;
	    	}
	    	if ($fecha_probable[1]==7 && $fecha_probable[0]==$_POST["anio"]) {
	    		$julio=$julio+1;
	    	}
	    	if ($fecha_probable[1]==8 && $fecha_probable[0]==$_POST["anio"]) {
	    		$agosto=$agosto+1;
	    	}
	    	if ($fecha_probable[1]==9 && $fecha_probable[0]==$_POST["anio"]) {
	    		$septiembre=$septiembre+1;
	    	}
	    	if ($fecha_probable[1]==10 && $fecha_probable[0]==$_POST["anio"]) {
	    		$octubre=$octubre+1;
	    	}
	    	if ($fecha_probable[1]==11 && $fecha_probable[0]==$_POST["anio"]) {
	    		$noviembre=$noviembre+1;
	    	}
	    	if ($fecha_probable[1]==12 && $fecha_probable[0]==$_POST["anio"]) {
	    		$diciembre=$diciembre+1;
	    	}
		}

		$html="";
		$html .= '<tr>';
	    $html .= ' <td class="center"> Ene '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$enero.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Feb '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$febrero.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Mar '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$marzo.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Abr '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$abril.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> May '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$mayo.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Jun '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$junio.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Jul '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$julio.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Ago '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$agosto.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Sep '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$septiembre.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Oct '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$octubre.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Nov '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$noviembre.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <td class="center"> Dic '.$_POST["anio"].' </td>';
	    $html .= ' <td class="center"> '.$diciembre.'</td>';
	    $html .= '</tr>';
	    $html .= '<tr>';
	    $html .= ' <th class="center"> Total </th>';
	    $html .= ' <th class="center"> '.$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre.'</th>';
	    $html .= '</tr>';
		echo $html;
	}
}