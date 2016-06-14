<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Sexo_Cria extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["sexo_cria"] = $this->modelo_base->Mostrar("sexo_cria","scr_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["sexo_cria.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["scr_descripcion","scr_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("sexo_cria",$campos);
			echo $guardarRaza;
		}else{
			$modifiscrRaza= $this->modelo_base->Modificar("sexo_cria",$campos,"scr_id");
			echo $modifiscrRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("sexo_cria","scr_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["sexo_cria","scr_id","scr_estado"]);
		echo $eliminarRaza;
	}


}