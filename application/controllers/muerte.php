<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Muerte extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["muerte"] = $this->modelo_base->MostrarQuery("select mue.mue_id,a.ani_rp,em.edm_descripcion,mue.mue_fecha from muerte as mue
			inner join animales as a on(a.ani_id=mue.mue_animal)
			inner join especificacion_de_muerte as em on(em.edm_id=mue.mue_espec_muerte)
			where mue.mue_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["especificacion_de_muerte"] = $this->desencriptar($this->modelo_base->Mostrar("especificacion_de_muerte","edm_estado","1"),"edm_id","edm_descripcion");


		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["muerte.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["mue_animal","mue_espec_muerte","mue_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("muerte",$campos);
			echo $guardarRaza;
		}else{
			$band = "mue_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("muerte",$campos,"mue_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("muerte","mue_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["muerte","mue_id","mue_estado"]);
		$this->modelo_base->eliminar_evento("muerte","mue_id","mue_animal","muerte");
		echo $eliminarRaza;
	}
}