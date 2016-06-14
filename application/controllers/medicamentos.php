<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Medicamentos extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["medicamentos"] = $this->modelo_base->Mostrar("medicamentos","med_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["medicamentos.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["med_descripcion","med_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("medicamentos",$campos);
			echo $guardarRaza;
		}else{
			$modifimedRaza= $this->modelo_base->Modificar("medicamentos",$campos,"med_id");
			echo $modifimedRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("medicamentos","med_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["medicamentos","med_id","med_estado"]);
		echo $eliminarRaza;
	}


}