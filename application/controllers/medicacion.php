<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Medicacion extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["medicacion"] = $this->modelo_base->MostrarQuery("select mec.mec_id,a.ani_rp,m.med_descripcion,va.vap_descripcion,mec.mec_fecha from medicacion as mec
			inner join animales as a on(a.ani_id=mec.mec_animal)
			inner join medicamentos as m on(m.med_id=mec.mec_medicamentos)
			inner join via_aplicacion as va on(va.vap_id=mec.mec_via_aplicacion)
			where mec.mec_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["medicamentos"] = $this->desencriptar($this->modelo_base->Mostrar("medicamentos","med_estado","1"),"med_id","med_descripcion");
		$data["via_aplicacion"] = $this->desencriptar($this->modelo_base->Mostrar("via_aplicacion","vap_estado","1"),"vap_id","vap_descripcion");

		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["medicacion.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["mec_animal","mec_via_aplicacion","mec_medicamentos","mec_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("medicacion",$campos);
			echo $guardarRaza;
		}else{
			$band = "mec_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("medicacion",$campos,"mec_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("medicacion","mec_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["medicacion","mec_id","mec_estado"]);
		$this->modelo_base->eliminar_evento("medicacion","mec_id","mec_animal","medicacion");
		echo $eliminarRaza;
	}
}