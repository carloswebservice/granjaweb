<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Resultado_Analisis extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["resultado_analisis"] = $this->modelo_base->Mostrar("resultado_analisis","res_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["resultado_analisis.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["res_descripcion","res_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("resultado_analisis",$campos);
			echo $guardarRaza;
		}else{
			$modifiresRaza= $this->modelo_base->Modificar("resultado_analisis",$campos,"res_id");
			echo $modifiresRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("resultado_analisis","res_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["resultado_analisis","res_id","res_estado"]);
		echo $eliminarRaza;
	}


}