<?php if ( ! defined('BASEPATH')) exit('No direct tiporegipt access allowed');
include_once "controlador_base.php";

class Tipo_Registro extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["tipo_registro"] = $this->modelo_base->Mostrar("tipo_registro","tiporeg_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tipo_registro.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["tiporeg_descripcion","tiporeg_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("tipo_registro",$campos);
			echo $guardarRaza;
		}else{
			$modifitiporegRaza= $this->modelo_base->Modificar("tipo_registro",$campos,"tiporeg_id");
			echo $modifitiporegRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("tipo_registro","tiporeg_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["tipo_registro","tiporeg_id","tiporeg_estado"]);
		echo $eliminarRaza;
	}


}