<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Tacto_Rectal extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["tacto_rectal"] = $this->modelo_base->MostrarQuery("select tr.tar_id,a.ani_rp,du.dgu_descripcion,eu.efu_descripcion,eo.efo_descripcion,mg.mdg_descripcion,va.vap_descripcion,tr.tar_fecha from tacto_rectal as tr
			inner join animales as a on(a.ani_id=tr.tar_animal)
			inner join diagnostico_utero as du on(du.dgu_id=tr.tar_diagnostico_utero)
			inner join enfermedad_utero as eu on(eu.efu_id=tr.tar_enfermedad_utero)
			inner join enfermedad_ovario as eo on(eo.efo_id=tr.tar_enfermedad_ovario)
			inner join medicina_genital as mg on(mg.mdg_id=tr.tar_medicina_genital)
			inner join via_aplicacion as va on(va.vap_id=tr.tar_via_aplicacion)
			where tr.tar_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["diagnostico_utero"] = $this->desencriptar($this->modelo_base->Mostrar("diagnostico_utero","dgu_estado","1"),"dgu_id","dgu_descripcion");
		$data["enfermedad_utero"] = $this->desencriptar($this->modelo_base->Mostrar("enfermedad_utero","efu_estado","1"),"efu_id","efu_descripcion");
		$data["enfermedad_ovario"] = $this->desencriptar($this->modelo_base->Mostrar("enfermedad_ovario","efo_estado","1"),"efo_id","efo_descripcion");
		$data["medicina_genital"] = $this->desencriptar($this->modelo_base->Mostrar("medicina_genital","mdg_estado","1"),"mdg_id","mdg_descripcion");
		$data["via_aplicacion"] = $this->desencriptar($this->modelo_base->Mostrar("via_aplicacion","vap_estado","1"),"vap_id","vap_descripcion");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tacto_rectal.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["tar_animal","tar_diagnostico_utero","tar_enfermedad_ovario","tar_enfermedad_utero","tar_medicina_genital","tar_via_aplicacion","tar_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("tacto_rectal",$campos);
			echo $guardarRaza;
		}else{
			$band = "tar_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("tacto_rectal",$campos,"tar_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("tacto_rectal","tar_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["tacto_rectal","tar_id","tar_estado"]);
		$this->modelo_base->eliminar_evento("tacto_rectal","tar_id","tar_animal","tacto rectal");
		echo $eliminarRaza;
	}
}