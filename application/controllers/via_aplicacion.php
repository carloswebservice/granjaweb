<?php if ( ! defined('BASEPATH')) exit('No divapt script access allowed');
include_once "controlador_base.php";

class Via_Aplicacion extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["via_aplicacion"] = $this->modelo_base->Mostrar("via_aplicacion","vap_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["via_aplicacion.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["vap_descripcion","vap_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("via_aplicacion",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("via_aplicacion",$campos,"vap_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("via_aplicacion","vap_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["via_aplicacion","vap_id","vap_estado"]);
		echo $eliminarRaza;
	}


}