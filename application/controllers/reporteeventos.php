<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reporteeventos extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";
		
		$Eventos['evento']=$this->modelo_base->MostrarArray("select *from evento where eve_estado=1");
		foreach ($Eventos['evento'] as $key => $value) {
			$query = "select distinct 
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-01' and e.eve_id=".$value['eve_id']." ) as enero,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-02' and e.eve_id=".$value['eve_id']." ) as febrero,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-03' and e.eve_id=".$value['eve_id']." ) as marzo,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-04' and e.eve_id=".$value['eve_id']." ) as abril,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-05' and e.eve_id=".$value['eve_id']." ) as mayo,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-06' and e.eve_id=".$value['eve_id']." ) as junio,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-07' and e.eve_id=".$value['eve_id'].") as julio,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-08' and e.eve_id=".$value['eve_id']." ) as agosto,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-09' and e.eve_id=".$value['eve_id']." ) as septiembre,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-10' and e.eve_id=".$value['eve_id']." ) as octubre,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-11' and e.eve_id=".$value['eve_id']." ) as noviembre,
			(select count(ea.eveani_id) from evento as e inner join eventoanimal as ea on(e.eve_id=ea.eveani_evento)
			where TO_CHAR(ea.eveani_fecha,'YYYY-MM')='".$_SESSION['añoactual']."-12' and e.eve_id=".$value['eve_id']." ) as diciembre";

			$Eventos['evento'][$key]['cantidad']=$this->modelo_base->MostrarArray($query);
		}
		//echo "<pre>";
		//print_r($Eventos); exit();
		$data["Eventos"] = $Eventos;
		$data["scripts"] = $this->cargar_js(["reporteeventos.js"]);
		parent::index($view,$data);
	}
}