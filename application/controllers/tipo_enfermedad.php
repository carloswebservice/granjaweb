<?php if ( ! defined('BASEPATH')) exit('No direct tpeipt access allowed');
include_once "controlador_base.php";

class Tipo_Enfermedad extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["tipo_enfermedad"] = $this->modelo_base->Mostrar("tipo_enfermedad","tpe_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tipo_enfermedad.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["tpe_descripcion","tpe_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("tipo_enfermedad",$campos);
			echo $guardarRaza;
		}else{
			$modifitpeRaza= $this->modelo_base->Modificar("tipo_enfermedad",$campos,"tpe_id");
			echo $modifitpeRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("tipo_enfermedad","tpe_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["tipo_enfermedad","tpe_id","tpe_estado"]);
		echo $eliminarRaza;
	}


}