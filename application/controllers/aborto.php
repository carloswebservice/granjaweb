<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Aborto extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["aborto"] = $this->modelo_base->MostrarQuery("select ab.abo_id,a.ani_rp,ca.cab_descripcion,ab.abo_fecha from aborto as ab
			inner join animales as a on(a.ani_id=ab.abo_animal)
			inner join causa_aborto as ca on(ca.cab_id=ab.abo_causaaborto)
			where ab.abo_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["causa_aborto"] = $this->desencriptar($this->modelo_base->Mostrar("causa_aborto","cab_estado","1"),"cab_id","cab_descripcion");

		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["aborto.js"]);
		parent::index($view,$data);
	}

	public function guardar(){

		if ($this->input->post("id")=="") {

			$campos = ["abo_animal","abo_causaaborto","abo_fecha"];
			$guardarRaza = $this->modelo_base->InsertarCalendar("aborto",$campos);
			echo $guardarRaza;
		}else{
			/*	print_r($_POST);*/
			$campos = ["abo_animal","abo_causaaborto","abo_fecha"];
			$band = "abo_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("aborto",$campos,"abo_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("aborto","abo_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["aborto","abo_id","abo_estado"]);
		$this->modelo_base->eliminar_evento("aborto","abo_id","abo_animal","aborto");
		echo $eliminarRaza;
	}
}