<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Modulo extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$querymodulo = "select mod.mod_id as idhijo, mod.mod_id as idpadre,mod.mod_descripcion as hijo, 
			m.mod_descripcion as padre, mod.mod_url as url, mod.mod_icono as icono
			from modulo as m inner join modulo as mod on(m.mod_id=mod.mod_padre)
			where mod.mod_estado=1 and m.mod_id>0 order by m.mod_descripcion desc";

		$data["Modulos"] = $this->modelo_base->MostrarQuery($querymodulo);
		$data["ModPadres"] = $this->modelo_base->Mostrar("modulo","mod_padre",0);
		$data["scripts"] = $this->cargar_js(["modulo.js"]);
		$view = get_class($this)."/index";
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["mod_descripcion","mod_url","mod_padre","mod_icono"];
		if ($this->input->post("id")=="") {
			$guardarModulo= $this->modelo_base->Insertar("modulo",$campos);
			echo $guardarModulo;
		}else{
			$modificarModulo= $this->modelo_base->Modificar("modulo",$campos,"mod_id");
			echo $modificarModulo;
		}
	}

	public function modificar(){
		$listaModulo= $this->modelo_base->Mostrar("modulo","mod_id",$this->input->post("id"));
		echo json_encode($listaModulo);
	}

	public function eliminar(){
		$eliminarModulo= $this->modelo_base->Eliminar(["modulo","mod_id","mod_estado"]);
		echo $eliminarModulo;
	}
}