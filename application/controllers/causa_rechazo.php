<?php if ( ! defined('BASEPATH')) exit('No dicart script access allowed');
include_once "controlador_base.php";

class Causa_Rechazo extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["causa_rechazo"] = $this->modelo_base->Mostrar("causa_rechazo","car_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["causa_rechazo.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["car_descripcion","car_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("causa_rechazo",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("causa_rechazo",$campos,"car_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("causa_rechazo","car_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["causa_rechazo","car_id","car_estado"]);
		echo $eliminarRaza;
	}


}