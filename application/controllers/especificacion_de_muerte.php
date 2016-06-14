<?php if ( ! defined('BASEPATH')) exit('No diedmt script access allowed');
include_once "controlador_base.php";

class Especificacion_De_Muerte extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["especificacion_de_muerte"] = $this->modelo_base->Mostrar("especificacion_de_muerte","edm_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["especificacion_de_muerte.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["edm_descripcion","edm_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("especificacion_de_muerte",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("especificacion_de_muerte",$campos,"edm_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("especificacion_de_muerte","edm_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["especificacion_de_muerte","edm_id","edm_estado"]);
		echo $eliminarRaza;
	}


}