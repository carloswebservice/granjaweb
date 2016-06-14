<?php if ( ! defined('BASEPATH')) exit('No diefot script access allowed');
include_once "controlador_base.php";

class Enfermedad_Ovario extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["enfermedad_ovario"] = $this->modelo_base->Mostrar("enfermedad_ovario","efo_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["enfermedad_ovario.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["efo_descripcion","efo_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("enfermedad_ovario",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("enfermedad_ovario",$campos,"efo_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("enfermedad_ovario","efo_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["enfermedad_ovario","efo_id","efo_estado"]);
		echo $eliminarRaza;
	}


}