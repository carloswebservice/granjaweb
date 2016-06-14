<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reganalisis extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["registro_analisis"] = $this->modelo_base->MostrarQuery("select ra.rga_id,a.ani_rp,ta.tpa_descripcion,re.res_descripcion,ra.rga_fecha from registro_analisis as ra
			inner join animales as a on(a.ani_id=ra.rga_animal)
			inner join tipo_analisis as ta on(ta.tpa_id=ra.rga_tipo_analisis)
			inner join resultado_analisis as re on(re.res_id=ra.rga_resultado_analisis)
			where ra.rga_estado=1");
		$data["animales"] = $this->desencriptar($this->modelo_base->Mostrar("animales","ani_estado","1"),"ani_id","ani_rp");
		$data["tipo_analisis"] = $this->desencriptar($this->modelo_base->Mostrar("tipo_analisis","tpa_estado","1"),"tpa_id","tpa_descripcion");
		$data["resultado_analisis"] = $this->desencriptar($this->modelo_base->Mostrar("resultado_analisis","res_estado","1"),"res_id","res_descripcion");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["reganalisis.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["rga_animal","rga_tipo_analisis","rga_resultado_analisis","rga_fecha"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("registro_analisis",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("registro_analisis",$campos,"rga_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("registro_analisis","rga_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["registro_analisis","rga_id","rga_estado"]);
		echo $eliminarRaza;
	}
}