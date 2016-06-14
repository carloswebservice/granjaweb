<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Tipousuario extends Controlador_Base {

    public function __construct(){
        parent::__construct();
        $this->load->model('modelo_base');
    }

	public function index(){
		$data["TipoUsuarios"] = $this->modelo_base->Mostrar("tipo_usuario","tiu_estado",1);
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["tipousuario.js"]);
		parent::index($view,$data);
	}

	public function grabar(){
        $this->db->where('per_tipousuario', $_POST["tiu_id"]);
        $this->db->delete('permisos');

        foreach ($_POST["permisos"] as $key => $value) {
            $data = array(
                "per_tipousuario" => $_POST["tiu_id"],
                "per_modulo" => $value
            );
            $this->db->insert("permisos",$data);
        }
        echo "Permisos Proporcionados Correctamente";
    }

    public function getmodulos(){
        $id = $_POST["tiu_id"];

        $modulos = $this->db->get_where("modulo",array("mod_estado"=> 1,"mod_padre"=>0))->result_array();
        $permisos = $this->db->get_where("permisos",array("per_tipousuario" => $id ))->result_array();

        $arrp = array();
        foreach ($permisos as $key => $value) {
            $arrp[] = $value["per_modulo"];
        }

        $html = "<ul id='nav' class='nav nav-list'>";
        foreach ($modulos as $key => $value) {
            $html.= "<li>";
            if(in_array($value["mod_id"],$arrp)){
                $at = "checked";
            }else{
                $at = "";
            }
            $html.=	"<label class='checkbox-inline tree-toggle nav-header'> <i class='".$value["mod_icono"]."'></i> ";
			$html.=	$value["mod_descripcion"];
			$html.= "</label>".$this->cargapadre($value["mod_id"],$arrp);
            $html.=  "</li>";
        }
        $html .= "</ul>";
        print $html;
    }

    public function cargapadre($idpadre,$arrp){

        $modulos = $this->db->get_where("modulo",array("mod_estado"=> 1,"mod_padre"=>$idpadre))->result_array();

        $html = "<ul class='nav nav-list tree' style='margin-left: 10px;'>";
        foreach ($modulos as $key => $value) {
        	$html.= "<li>";
            if(in_array($value["mod_id"],$arrp)){
                $at = "checked";
            }else{
                $at = "";
            }
            $html.=	"<label class='checkbox-inline tree-toggle nav-header'> ";
			$html.=	"<input type='checkbox' name='permisos[]' value='".$value["mod_id"]."' $at>".$value["mod_descripcion"];
			$html.= "</label>";
            $html.=  "</li>";
        }
        $html .= "</ul>";
        return  $html;
    }

	public function guardar(){
		$campos = ["tiu_descripcion","tiu_abreviatura"];
        if ($this->input->post("id")=="") {
            $guardarTipoUsuario= $this->modelo_base->Insertar("tipo_usuario",$campos);
            echo $guardarTipoUsuario;
        }else{
            $modificarTipoUsuario= $this->modelo_base->Modificar("tipo_usuario",$campos,"tiu_id");
            echo $modificarTipoUsuario;
        }
	}

	public function modificar(){
        $listaUsuario= $this->modelo_base->Mostrar("tipo_usuario","tiu_id",$this->input->post("id"));
		echo json_encode($listaUsuario);
	}

	public function eliminar(){
		$eliminarTipoUsuario= $this->modelo_base->Eliminar(["tipo_usuario","tiu_id","tiu_estado"]);
		echo $eliminarTipoUsuario;
	}
}