<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Especificacion_De_Venta extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["especificacion_de_venta"] = $this->modelo_base->Mostrar("especificacion_de_venta","edv_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["especificacion_de_venta.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["edv_descripcion","edv_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("especificacion_de_venta",$campos);
			echo $guardarRaza;
		}else{
			$modifiedvRaza= $this->modelo_base->Modificar("especificacion_de_venta",$campos,"edv_id");
			echo $modifiedvRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("especificacion_de_venta","edv_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["especificacion_de_venta","edv_id","edv_estado"]);
		echo $eliminarRaza;
	}


}