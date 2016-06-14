<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reporteanimales extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";		
		$animales["animal"]=$this->modelo_base->MostrarArray(
			"select *from animales"
		);
		foreach ($animales["animal"] as $key => $value) {
			$query=$this->modelo_base->MostrarArray("select ani_rp,ani_nombre from animales where ani_rp='".$value["ani_madre"]."'");
			$animales["animal"][$key]["madre"]=$query;
			$query=$this->modelo_base->MostrarArray("select r.rep_rp,r.rep_raza from animales as a inner join reproductor as r on(a.ani_padre=r.rep_rp) where a.ani_id=".$value["ani_id"]);
			$animales["animal"][$key]["padre"]=$query;
		}
		//echo "<pre>";
		//print_r($animales); exit();
		$data["animales"] = $animales;
		$data["scripts"] = $this->cargar_js(["reporteanimales.js"]);
		parent::index($view,$data);
	}

}