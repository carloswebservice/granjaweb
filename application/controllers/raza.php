<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Raza extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["Razas"] = $this->modelo_base->Mostrar("raza","raz_estado",1);
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["raza.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["raz_descripcion","raz_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("raza",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("raza",$campos,"raz_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("raza","raz_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["raza","raz_id","raz_estado"]);
		echo $eliminarRaza;
	}
}