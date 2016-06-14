<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Indicaciones_Especiales_Evento extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["indicaciones_especiales_evento"] = $this->modelo_base->MostrarQuery("select iee.iee_id,a.ani_rp,ie.ide_descripcion,iee.iee_fecha from indicaciones_especiales_evento as iee
			inner join animales as a on(a.ani_id=iee.iee_animal)
			inner join indicaciones_especiales as ie on(ie.ide_id=iee.iee_indicaciones_especiales)
			where iee.iee_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["indicaciones_especiales"] = $this->desencriptar($this->modelo_base->Mostrar("indicaciones_especiales","ide_estado","1"),"ide_id","ide_descripcion");

		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["indicaciones_especiales_evento.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["iee_animal","iee_indicaciones_especiales","iee_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("indicaciones_especiales_evento",$campos);
			echo $guardarRaza;
		}else{
			$band = "iee_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("indicaciones_especiales_evento",$campos,"iee_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("indicaciones_especiales_evento","iee_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["indicaciones_especiales_evento","iee_id","iee_estado"]);
		$this->modelo_base->eliminar_evento("indicaciones_especiales_evento","iee_id","iee_animal","indicaciones especiales");
		echo $eliminarRaza;
	}
}