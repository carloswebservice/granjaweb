<?php if ( ! defined('BASEPATH')) exit('No dipert script access allowed');
include_once "controlador_base.php";

class Personal extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["personal"] = $this->modelo_base->MostrarQuery("select per.per_id,per.per_apepa,per.per_apema,per.per_nombre,per.per_direccion,d.distrito,per.per_dni,per.per_telefono from personal as per
			inner join distrito as d on(d.id_dist=per.per_distrito) where per_estado=1");
		$data["departamentos"] = $this->desencriptar($this->db->get("departamento")->result(),"id_depa","departamento");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["personal.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["per_nombre","per_apepa","per_apema","per_distrito","per_direccion","per_dni","per_telefono"];
		if ($this->input->post("id")=="") {
			$guardarRaza= $this->modelo_base->Insertar("personal",$campos);
			echo $guardarRaza;
		}else{
			$modificarRaza= $this->modelo_base->Modificar("personal",$campos,"per_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("personal","per_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["personal","per_id","per_estado"]);
		echo $eliminarRaza;
	}

	public function traer_provincias()
	{
		$provincias = $this->desencriptar($this->db->get_where("provincia",array("id_depa"=>
			$this->input->post("iddepa")))->result(),"id_prov","provincia");
		echo form_dropdown('', $provincias,'', 'id="prov" class="form-control" required');
	}

	public function traer_distritos()
	{
		$distritos = $this->desencriptar($this->db->get_where("distrito",array("id_prov"=>
			$this->input->post("idprov")))->result(),"id_dist","distrito");
		echo form_dropdown('per_distrito', $distritos,'', ' class="form-control" required');
	}
}