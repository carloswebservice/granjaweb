<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Rechazo extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["rechazo"] = $this->modelo_base->MostrarQuery("select rec.rec_id,a.ani_rp,cr.car_descripcion,rec.rec_fecha from rechazo as rec
			inner join animales as a on(a.ani_id=rec.rec_animal)
			inner join causa_rechazo as cr on(cr.car_id=rec.rec_causa_rechazo)
			where rec.rec_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["causa_rechazo"] = $this->desencriptar($this->modelo_base->Mostrar("causa_rechazo","car_estado","1"),"car_id","car_descripcion");


		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["rechazo.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["rec_animal","rec_causa_rechazo","rec_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("rechazo",$campos);
			echo $guardarRaza;
		}else{
			$band = "rec_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("rechazo",$campos,"rec_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("rechazo","rec_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["rechazo","rec_id","rec_estado"]);
		$this->modelo_base->eliminar_evento("rechazo","rec_id","rec_animal","rechazo");
		echo $eliminarRaza;
	}
}