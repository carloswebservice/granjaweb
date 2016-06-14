<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Medicina_Genital extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["medicina_genital"] = $this->modelo_base->Mostrar("medicina_genital","mdg_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["medicina_genital.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["mdg_descripcion","mdg_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("medicina_genital",$campos);
			echo $guardarRaza;
		}else{
			$modifimdgRaza= $this->modelo_base->Modificar("medicina_genital",$campos,"mdg_id");
			echo $modifimdgRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("medicina_genital","mdg_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["medicina_genital","mdg_id","mdg_estado"]);
		echo $eliminarRaza;
	}


}