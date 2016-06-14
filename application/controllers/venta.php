<?php if ( ! defined('BASEPATH')) exit('No divent script access allowed');
include_once "controlador_base.php";

class Venta extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["venta"] = $this->modelo_base->MostrarQuery("select ven.ven_id,a.ani_rp,edv.edv_descripcion,ven.ven_fecha from venta as ven
			inner join animales as a on(a.ani_id=ven.ven_animal)
			inner join especificacion_de_venta as edv on(edv.edv_id=ven.ven_especificacion_venta)
			where ven.ven_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["especificacion_de_venta"] = $this->desencriptar($this->modelo_base->Mostrar("especificacion_de_venta","edv_estado","1"),"edv_id","edv_descripcion");

		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["venta.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["ven_animal","ven_especificacion_venta","ven_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->InsertarCalendar("venta",$campos);
			echo $guardarRaza;
		}else{
			$band = "ven_animal";
			$modificarRaza= $this->modelo_base->ModificarCalendar("venta",$campos,"ven_id",$band);
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("venta","ven_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["venta","ven_id","ven_estado"]);
		$this->modelo_base->eliminar_evento("venta","ven_id","ven_animal","venta");
		echo $eliminarRaza;
	}
}