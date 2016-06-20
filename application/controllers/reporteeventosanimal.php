<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reporteeventosanimal extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";
		
		$animales['animal']=$this->modelo_base->MostrarArray(
			"select ani_id,ani_rp, ani_nombre from animales where ani_estado=1"
		);
		foreach ($animales['animal'] as $key => $value) {
			$evento=$this->modelo_base->MostrarArray(
				"select ea.eveani_fecha as fecha, e.eve_descripcion as evento from animales as a inner join eventoanimal as ea on(a.ani_id=ea.eveani_animal) inner join evento as e on (e.eve_id=ea.eveani_evento) where a.ani_id=".$value["ani_id"]." order by ea.eveani_fecha"
			);
			$animales['animal'][$key]["evento"]=$evento;
		}
		//echo "<pre>";
		//print_r($animales); exit();
		$data["animales"] = $animales;
		$data["scripts"] = $this->cargar_js(["reporteeventosanimal.js"]);
		parent::index($view,$data);
	}
}