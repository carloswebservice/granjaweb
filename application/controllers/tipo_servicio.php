<?php if ( ! defined('BASEPATH')) exit('No direct tpsipt access allowed');
include_once "controlador_base.php";

class Tipo_Servicio extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["tipo_servicio"] = $this->modelo_base->Mostrar("tipo_servicio","tps_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tipo_servicio.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["tps_descripcion","tps_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("tipo_servicio",$campos);
			echo $guardarRaza;
		}else{
			$modifitpsRaza= $this->modelo_base->Modificar("tipo_servicio",$campos,"tps_id");
			echo $modifitpsRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("tipo_servicio","tps_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["tipo_servicio","tps_id","tps_estado"]);
		echo $eliminarRaza;
	}


}