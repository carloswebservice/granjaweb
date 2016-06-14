<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Estado_Cria extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["estado_cria"] = $this->modelo_base->Mostrar("estado_cria","etc_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["estado_cria.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["etc_descripcion","etc_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("estado_cria",$campos);
			echo $guardarRaza;
		}else{
			$modifietcRaza= $this->modelo_base->Modificar("estado_cria",$campos,"etc_id");
			echo $modifietcRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("estado_cria","etc_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["estado_cria","etc_id","etc_estado"]);
		echo $eliminarRaza;
	}


}