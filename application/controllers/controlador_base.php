<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Controlador_Base extends CI_Controller {

	private $css; // css a incluir a la plantilla
	private $js; // js a incluir a la plantilla

	public function __construct(){

		parent::__construct();
		$this->load->model("modelo_base");
	}

	public function index($view,$array = array()){
		$data["view"] = $view;
		if(count($array)>0) {
			$data["param"] = $array;
		}
		$data["permisos"] = $this->modelo_base->traer_modulos();
		//echo "<pre>";
		//print_r($data["permisos"]); exit();
		$this->load->view("layout",$data);
	}

	public function cargar_css($css_array){
		for($i = 0 ; $i < count($css_array) ; $i++) {
			$this->css[]='<link href="'.base_url('Librerias/assets/css/'.$css_array[$i]).'" rel="stylesheet" />';
		}
		return $this->css;
	}

	public function cargar_js($js_array){
		for($i = 0 ; $i < count($js_array) ; $i++) {
			$this->js[] = '<script src="'.base_url('Librerias/app/'.$js_array[$i]).'"></script>';
		}
		return $this->js;
	}

	public function desencriptar($array,$valor,$texto){
		$select = array(""=>"Seleccione");
		if(count($array)>0) {
			foreach ($array as $value) {
				$select[$value->$valor] = $value->$texto;
			}
		}
		return $select;
	}
}