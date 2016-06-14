<?php if ( ! defined('BASEPATH')) exit('No diefut script access allowed');
include_once "controlador_base.php";

class Enfermedad_Utero extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["enfermedad_utero"] = $this->modelo_base->Mostrar("enfermedad_utero","efu_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["enfermedad_utero.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["efu_descripcion","efu_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("enfermedad_utero",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("enfermedad_utero",$campos,"efu_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("enfermedad_utero","efu_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["enfermedad_utero","efu_id","efu_estado"]);
		echo $eliminarRaza;
	}


}