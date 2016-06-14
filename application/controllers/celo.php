<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Celo extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["celo"] = $this->modelo_base->MostrarQuery("select ce.cel_id,a.ani_rp,cni.cni_descripcion,mg.mdg_descripcion,va.vap_descripcion,ce.cel_fecha from celo as ce
			inner join animales as a on(a.ani_id=ce.cel_animal)
			inner join causa_no_inseminal as cni on(cni.cni_id=ce.cel_causa_no_inseminal)
			inner join medicina_genital as mg on(mg.mdg_id=ce.cel_medicina_genital)
			inner join via_aplicacion as va on(va.vap_id=ce.cel_via_aplicacion)
			where ce.cel_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["causa_no_inseminal"] = $this->desencriptar($this->modelo_base->Mostrar("causa_no_inseminal","cni_estado","1"),"cni_id","cni_descripcion");
		$data["medicina_genital"] = $this->desencriptar($this->modelo_base->Mostrar("medicina_genital","mdg_estado","1"),"mdg_id","mdg_descripcion");
		$data["via_aplicacion"] = $this->desencriptar($this->modelo_base->Mostrar("via_aplicacion","vap_estado","1"),"vap_id","vap_descripcion");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["celo.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["cel_animal","cel_causa_no_inseminal","cel_medicina_genital","cel_via_aplicacion","cel_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("celo",$campos);
			echo $guardarRaza;
		}else{
			$band = "cel_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("celo",$campos,"cel_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("celo","cel_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["celo","cel_id","cel_estado"]);
		$this->modelo_base->eliminar_evento("celo","cel_id","cel_animal","celo");
		echo $eliminarRaza;
	}
}