<?php if ( ! defined('BASEPATH')) exit('No didgut script access allowed');
include_once "controlador_base.php";

class Diagnostico_Utero extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["diagnostico_utero"] = $this->modelo_base->Mostrar("diagnostico_utero","dgu_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["diagnostico_utero.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["dgu_descripcion","dgu_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("diagnostico_utero",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("diagnostico_utero",$campos,"dgu_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("diagnostico_utero","dgu_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["diagnostico_utero","dgu_id","dgu_estado"]);
		echo $eliminarRaza;
	}


}