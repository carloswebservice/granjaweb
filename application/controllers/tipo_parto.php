<?php if ( ! defined('BASEPATH')) exit('No direct tpaipt access allowed');
include_once "controlador_base.php";

class Tipo_Parto extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["tipo_parto"] = $this->modelo_base->Mostrar("tipo_parto","tpa_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tipo_parto.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["tpa_descripcion","tpa_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("tipo_parto",$campos);
			echo $guardarRaza;
		}else{
			$modifitpaRaza= $this->modelo_base->Modificar("tipo_parto",$campos,"tpa_id");
			echo $modifitpaRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("tipo_parto","tpa_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["tipo_parto","tpa_id","tpa_estado"]);
		echo $eliminarRaza;
	}


}