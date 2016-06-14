<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Med_Cuartos_Mamarios extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["med_cuartos_mamarios"] = $this->modelo_base->Mostrar("med_cuartos_mamarios","mdm_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["med_cuartos_mamarios.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["mdm_descripcion","mdm_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("med_cuartos_mamarios",$campos);
			echo $guardarRaza;
		}else{
			$modifimdmRaza= $this->modelo_base->Modificar("med_cuartos_mamarios",$campos,"mdm_id");
			echo $modifimdmRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("med_cuartos_mamarios","mdm_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["med_cuartos_mamarios","mdm_id","mdm_estado"]);
		echo $eliminarRaza;
	}


}