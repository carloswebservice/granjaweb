<?php if ( ! defined('BASEPATH')) exit('No disert script access allowed');
include_once "controlador_base.php";

class Servicio extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["servicio"] = $this->modelo_base->MostrarQuery("select ser.ser_id,a.ani_rp,r.rep_rp,p.per_nombre,p.per_apema,p.per_apepa,ts.tps_descripcion,ser.ser_fecha from servicio as ser
			inner join animales as a on(a.ani_id=ser.ser_animal)
			inner join reproductor as r on(r.rep_id=ser.ser_reproductor)
			inner join personal as p on(p.per_id=ser.ser_personal)
			inner join tipo_servicio as ts on(ts.tps_id=ser.ser_tipo_servicio)
			where ser.ser_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["reproductor"] = $this->desencriptar($this->modelo_base->Mostrar("reproductor","rep_estado","1"),"rep_id","rep_rp");
		$data["personal"] = $this->desencriptar($this->modelo_base->Mostrar("personal","per_estado","1"),"per_id","per_dni");
		$data["tipo_servicio"] = $this->desencriptar($this->modelo_base->Mostrar("tipo_servicio","tps_estado","1"),"tps_id","tps_descripcion");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["servicio.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["ser_animal","ser_reproductor","ser_personal","ser_tipo_servicio","ser_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("servicio",$campos);
			echo $guardarRaza;
		}else{
			$band = "ser_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("servicio",$campos,"ser_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("servicio","ser_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["servicio","ser_id","ser_estado"]);
		$this->modelo_base->eliminar_evento("servicio","ser_id","ser_animal","servicio");
		echo $eliminarRaza;
	}
}