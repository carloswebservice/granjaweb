<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Granja extends Controlador_Base {

	public function index(){
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["granja.js"]);
		parent::index($view,$data);
	}
}