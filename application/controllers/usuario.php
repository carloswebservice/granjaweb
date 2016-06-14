<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Usuario extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$queryusuario ="select p.per_dni as dni,p.per_apepa as apellido,p.per_nombre as nombre,u.*,tu.tiu_descripcion as tipouser from personal as p inner join usuario as u on(p.per_id=u.usu_personal) inner join tipo_usuario as tu on (u.usu_tipousuario=tu.tiu_id) where u.usu_estado=1";

		$data["Usuarios"] = $this->modelo_base->MostrarQuery($queryusuario);
		$data["Personal"] = $this->modelo_base->Mostrar("personal","per_estado",1);
		$data["TipoUsuarios"] = $this->modelo_base->Mostrar("tipo_usuario","tiu_estado",1);
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["usuario.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["usu_personal","usu_tipousuario","usu_nombre","usu_clave"];
		if ($this->input->post("id")=="") {
			$guardarUsuario= $this->modelo_base->Insertar("usuario",$campos);
			echo $guardarUsuario;
		}else{
			$modificarUsuario= $this->modelo_base->Modificar("usuario",$campos,"usu_id");
			echo $modificarUsuario;
		}
	}

	public function modificar(){
		$listaUsuario= $this->modelo_base->Mostrar("usuario","usu_id",$this->input->post("id"));
		echo json_encode($listaUsuario);
	}

	public function eliminar(){
		$eliminarUsuario= $this->modelo_base->Eliminar(["usuario","usu_id","usu_estado"]);
		echo $eliminarUsuario;
	}
}