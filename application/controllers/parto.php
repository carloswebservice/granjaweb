<?php if ( ! defined('BASEPATH')) exit('No dipart script access allowed');
include_once "controlador_base.php";

class Parto extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["parto"] = $this->modelo_base->MostrarQuery("select par.par_id,a.ani_rp,tp.tpa_descripcion,ec.etc_descripcion,sc.scr_descripcion,s.ser_id,par.par_fecha from parto as par
			inner join animales as a on(a.ani_id=par.par_animal)
			inner join tipo_parto as tp on(tp.tpa_id=par.par_tipo_parto)
			inner join estado_cria as ec on(ec.etc_id=par.par_estado_cria)
			inner join sexo_cria as sc on(sc.scr_id=par.par_sexo_cria)
			inner join servicio as s on(s.ser_id=par.par_servicio)
			where par.par_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["tipo_parto"] = $this->desencriptar($this->modelo_base->Mostrar("tipo_parto","tpa_estado","1"),"tpa_id","tpa_descripcion");
		$data["estado_cria"] = $this->desencriptar($this->modelo_base->Mostrar("estado_cria","etc_estado","1"),"etc_id","etc_descripcion");
		$data["sexo_cria"] = $this->desencriptar($this->modelo_base->Mostrar("sexo_cria","scr_estado","1"),"scr_id","scr_descripcion");
		$data["servicio"] = $this->desencriptar($this->modelo_base->Mostrar("servicio","ser_estado","1"),"ser_id","ser_id");

		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["parto.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["par_animal","par_tipo_parto","par_sexo_cria","par_estado_cria","par_servicio","par_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("parto",$campos);
			echo $guardarRaza;
		}else{
			$band = "par_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("parto",$campos,"par_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("parto","par_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["parto","par_id","par_estado"]);
		$this->modelo_base->eliminar_evento("parto","par_id","par_animal","parto");
		echo $eliminarRaza;
	}
}