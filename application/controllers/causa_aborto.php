<?php if ( ! defined('BASEPATH')) exit('No dicabt script access allowed');
include_once "controlador_base.php";

class Causa_Aborto extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["causa_aborto"] = $this->modelo_base->Mostrar("causa_aborto","cab_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["causa_aborto.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["cab_descripcion","cab_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("causa_aborto",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("causa_aborto",$campos,"cab_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("causa_aborto","cab_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["causa_aborto","cab_id","cab_estado"]);
		echo $eliminarRaza;
	}


}