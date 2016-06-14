<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Analisis extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["analisis"] = $this->modelo_base->MostrarQuery("select an.ana_id,a.ani_rp,ta.tpa_descripcion,ra.res_descripcion,an.ana_fecha from analisis as an
			inner join animales as a on(a.ani_id=an.ana_animal)
			inner join tipo_analisis as ta on(ta.tpa_id=an.ana_tipo_analisis)
			inner join resultado_analisis as ra on(ra.res_id=an.ana_resultado_analisis)
			where an.ana_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["tipo_analisis"] = $this->desencriptar($this->modelo_base->Mostrar("tipo_analisis","tpa_estado","1"),"tpa_id","tpa_descripcion");
		$data["resultado_analisis"] = $this->desencriptar($this->modelo_base->Mostrar("resultado_analisis","res_estado","1"),"res_id","res_descripcion");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["analisis.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["ana_animal","ana_tipo_analisis","ana_resultado_analisis","ana_fecha"];
		if ($this->input->post("id")=="") {

			$guardarRaza= $this->modelo_base->InsertarCalendar("analisis",$campos);
			echo $guardarRaza;
		}else{
			$band = "ana_animal";

			$modificarRaza= $this->modelo_base->ModificarCalendar("analisis",$campos,"ana_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("analisis","ana_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["analisis","ana_id","ana_estado"]);
		$this->modelo_base->eliminar_evento("analisis","ana_id","ana_animal","analisis");
		echo $eliminarRaza;
	}
}