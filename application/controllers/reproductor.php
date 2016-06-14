<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reproductor extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["reproductor"] = $this->modelo_base->Mostrar("reproductor","rep_estado","1");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["reproductor.js"]);
		parent::index($view,$data);
	}

	public function guardar(){

		if ($this->input->post("id")=="") {
			$campos = ["rep_rp","rep_nacionalidad","rep_raza","rep_color","rep_foto"];
			$guardarRaza= $this->modelo_base->Insertar("reproductor",$campos);
			echo $guardarRaza;
		}else{
			if(!isset($_POST["rep_foto"])){
				$campos = ["rep_rp","rep_nacionalidad","rep_raza","rep_color"];
			}else{
				$campos = ["rep_rp","rep_nacionalidad","rep_raza","rep_color","rep_foto"];
			}

			if( isset( $_POST["foto_anterior"] ) && isset($_POST["rep_foto"]) ) {

				unlink( "./Librerias/assets/images/".$_POST["foto_anterior"] );
			}


			$modificarRaza= $this->modelo_base->Modificar("reproductor",$campos,"rep_id");
			echo $modificarRaza;
		}
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("reproductor","rep_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["reproductor","rep_id","rep_estado"]);
		echo $eliminarRaza;
	}

	public function cargar_imagen()
	{
		$ruta = "./Librerias/assets/images/".$_FILES['foto']['name'];

		if ( ! move_uploaded_file($_FILES['foto']['tmp_name'],$ruta))
		{
			echo "<script>alert('Error Al subir imagen');<script>";
		}
		chmod($ruta, 0777);

	}
}