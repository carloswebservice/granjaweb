<?php if ( ! defined('BASEPATH')) exit('No disect script access allowed');
include_once "controlador_base.php";

class Secado extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["secado"] = $this->modelo_base->MostrarQuery("select sec.sec_id,a.ani_rp,mcm.mdm_descripcion,sec.sec_fecha from secado as sec
			inner join animales as a on(a.ani_id=sec.sec_animal)
			inner join med_cuartos_mamarios as mcm on(mcm.mdm_id=sec.sec_med_cuartos_mamarios)
			where sec.sec_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["med_cuartos_mamarios"] = $this->desencriptar($this->modelo_base->Mostrar("med_cuartos_mamarios","mdm_estado","1"),"mdm_id","mdm_descripcion");


		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["secado.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["sec_animal","sec_med_cuartos_mamarios","sec_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("secado",$campos);
			echo $guardarRaza;
		}else{
				$band = "sec_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("secado",$campos,"sec_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("secado","sec_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["secado","sec_id","sec_estado"]);
		$this->modelo_base->eliminar_evento("secado","sec_id","sec_animal","secado");
		echo $eliminarRaza;
	}
}