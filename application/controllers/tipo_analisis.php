<?php if ( ! defined('BASEPATH')) exit('No direct tpaipt access allowed');
include_once "controlador_base.php";

class Tipo_Analisis extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["tipo_analisis"] = $this->modelo_base->Mostrar("tipo_analisis","tpa_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tipo_analisis.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["tpa_descripcion","tpa_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("tipo_analisis",$campos);
			echo $guardarRaza;
		}else{
			$modifitpaRaza= $this->modelo_base->Modificar("tipo_analisis",$campos,"tpa_id");
			echo $modifitpaRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("tipo_analisis","tpa_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["tipo_analisis","tpa_id","tpa_estado"]);
		echo $eliminarRaza;
	}


}