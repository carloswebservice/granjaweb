<?php if ( ! defined('BASEPATH')) exit('No dicnit script access allowed');
include_once "controlador_base.php";

class Causa_No_Inseminal extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["causa_no_inseminal"] = $this->modelo_base->Mostrar("causa_no_inseminal","cni_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["causa_no_inseminal.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["cni_descripcion","cni_abreviatura"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("causa_no_inseminal",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("causa_no_inseminal",$campos,"cni_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("causa_no_inseminal","cni_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["causa_no_inseminal","cni_id","cni_estado"]);
		echo $eliminarRaza;
	}


}