<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Indicaciones_Especiales extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["indicaciones_especiales"] = $this->modelo_base->Mostrar("indicaciones_especiales","ide_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["indicaciones_especiales.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["ide_descripcion","ide_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("indicaciones_especiales",$campos);
			echo $guardarRaza;
		}else{
			$modifiideRaza= $this->modelo_base->Modificar("indicaciones_especiales",$campos,"ide_id");
			echo $modifiideRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("indicaciones_especiales","ide_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["indicaciones_especiales","ide_id","ide_estado"]);
		echo $eliminarRaza;
	}


}