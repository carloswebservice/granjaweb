<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Simbolo extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["Eventos"] = $this->modelo_base->Mostrar("evento","eve_estado",1);
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["simbolo.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["eve_descripcion","eve_simbolo","eve_color"];
		if ($this->input->post("id")=="") {
			$guardarEvento= $this->modelo_base->Insertar("evento",$campos);
			echo $guardarEvento;
		}else{
			$modificarEvento= $this->modelo_base->Modificar("evento",$campos,"eve_id");
			echo $modificarEvento;
		}
	}

	public function modificar(){
		$listaEvento= $this->modelo_base->Mostrar("evento","eve_id",$this->input->post("id"));
		echo json_encode($listaEvento);
	}

	public function eliminar(){
		$eliminarEvento= $this->modelo_base->Eliminar(["evento","eve_id","eve_estado"]);
		echo $eliminarEvento;
	}
}