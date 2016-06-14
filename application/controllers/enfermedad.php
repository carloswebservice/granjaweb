<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Enfermedad extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["enfermedad"] = $this->modelo_base->MostrarQuery("select e.enf_id,a.ani_rp,te.tpe_descripcion,m.med_descripcion,va.vap_descripcion,e.enf_fecha from enfermedad as e
			inner join animales as a on(a.ani_id=e.enf_animal)
			inner join tipo_enfermedad as te on(te.tpe_id=e.enf_tipo_enfermedad)
			inner join medicamentos as m on(m.med_id=e.enf_medicamentos)
			inner join via_aplicacion as va on(va.vap_id=e.enf_via_aplicacion)
			where e.enf_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["tipo_enfermedad"] = $this->desencriptar($this->modelo_base->Mostrar("tipo_enfermedad","tpe_estado","1"),"tpe_id","tpe_descripcion");
		$data["medicamentos"] = $this->desencriptar($this->modelo_base->Mostrar("medicamentos","med_estado","1"),"med_id","med_descripcion");
		$data["via_aplicacion"] = $this->desencriptar($this->modelo_base->Mostrar("via_aplicacion","vap_estado","1"),"vap_id","vap_descripcion");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["enfermedad.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["enf_animal","enf_tipo_enfermedad","enf_medicamentos","enf_via_aplicacion","enf_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("enfermedad",$campos);
			echo $guardarRaza;
		}else{
			$band = "enf_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("enfermedad",$campos,"enf_id",$band);

			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("enfermedad","enf_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["enfermedad","enf_id","enf_estado"]);
		$this->modelo_base->eliminar_evento("enfermedad","enf_id","enf_animal","enfermedad");
		echo $eliminarRaza;
	}
}