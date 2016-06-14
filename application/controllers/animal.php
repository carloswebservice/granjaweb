<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Animal extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$queryanimal="select a.*,tp.tiporeg_descripcion as ani_tiporegi, r.raz_descripcion as ani_raza from animales as a inner join tipo_registro as tp on(a.ani_tiporeg=tp.tiporeg_id) inner join raza as r on(a.ani_raza=r.raz_id) where a.ani_estado=1";

		$data["Animales"] = $this->modelo_base->MostrarQuery($queryanimal);
		$data["Razas"] = $this->modelo_base->Mostrar("raza","raz_estado",1);
		$data["scripts"] = $this->cargar_js(["animal.js"]);
		$view = get_class($this)."/index";
		parent::index($view,$data);
	}

	public function guardar(){
		$campos = ["ani_rp","ani_nombre","ani_padre","ani_madre","ani_fechanac","ani_fechareg","ani_tiporeg",
		"ani_raza","ani_proveedor","ani_descripcion","ani_sexo"];
		if ($this->input->post("id")=="") {
			$guardarAnimal= $this->modelo_base->Insertar("animales",$campos);
			echo $guardarAnimal;
		}else{
			$modificarAnimal= $this->modelo_base->Modificar("animales",$campos,"ani_id");
			echo $modificarAnimal;
		}
	}

	public function modificar(){
		$listaAnimal= $this->modelo_base->Mostrar("animales","ani_id",$this->input->post("id"));
		echo json_encode($listaAnimal);
	}

	public function eliminar(){
		$eliminarAnimal= $this->modelo_base->Eliminar(["animales","ani_id","ani_estado"]);
		echo $eliminarAnimal;
	}

	public function getgaleria(){
        $id = $_POST["fot_animal"];
        $fot= $this->modelo_base->MostrarArray("select *from foto_animal where fot_estado=1 and fot_animal=".$id);

        $html = "";
        foreach ($fot as $key => $value) {
            $html.= "<div class='col-md-3 col-sm-4 gallery-img'>";
            $html.= 	"<div class='wrap-image'>";
            $html.=			"<a class='group1 cboxElement' title='".$value["fot_descripcion"]."'>
								<img src='Librerias/assets/images/".$value["fot_foto"]."' alt='' class='img-responsive'>
							</a>";
			$html.=			"<div class='tools tools-bottom'>
								<a href='#'> <i class='fa fa-edit'></i> </a>
								<a href='#'> <i class='fa fa-times'></i> </a>
							</div>";
			$html.= 	"</div>";
            $html.= "</div>";
        }
        print $html;
    }

	public function guardarfoto(){
		$this->load->database('default');
		$file=$_FILES['imagen']['name'];
		move_uploaded_file($_FILES["imagen"]["tmp_name"],'./Librerias/assets/images/'.$file);

		$config['upload_path'] = './Librerias/assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
			
		$this->load->library('upload', $config);	
		$this->upload->do_upload("imagen");
		$icono = $this->upload->data();

		$data = array(
            "fot_animal"=>$_POST["fot_animal"],
            "fot_descripcion" => $_POST["fot_descripcion"],
            "fot_foto" => $file,
        );                    
        $estado = $this->db->insert("foto_animal",$data);
		if ($estado==1) {
			$conten = $this->getgaleria();
			echo $conten;
		}else{
			echo "ErrorI";
		}
	}
}