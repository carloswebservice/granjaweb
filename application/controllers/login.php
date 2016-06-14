<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("modelo_base");
	}

	public function index(){
		$this->load->view("Login/index.php");
	}

	public function control(){
	    $this->db->where('usu_nombre',$_POST["usuario"]);
        $this->db->where('usu_clave',$_POST["clave"]);
        $this->db->where('usu_estado',1);
        $this->db->from('usuario');
        $query = $this->db->get();
        $usuario = $query->result_array();

        if(count($usuario) == 1){

			$_SESSION["usuario"]=$usuario[0]['usu_nombre'];
			$_SESSION['personal']=$usuario[0]['usu_personal'];
            $_SESSION['tipousuario'] = $usuario[0]['usu_tipousuario'];
            $_SESSION['añoactual'] = 2016;
            $_SESSION['añocalendar'] = 2016;
            $this->modelo_base->registrar_log("Ingreso Al Sistema");
			echo json_encode(count($usuario));
		}else{
			echo json_encode(count($usuario));
		}
	}

	public function cerrarsession(){
		$this->modelo_base->registrar_log("Salio Del Sistema");
		session_destroy();
		redirect(base_url());
	}

	public function restarcalendar(){
		$_SESSION['añocalendar'] = $_SESSION['añocalendar'] - 1;
	}

	public function sumarcalendar(){
		$_SESSION['añocalendar'] = $_SESSION['añocalendar'] + 1;
	}

	public function restaryear(){
		$_SESSION['añoactual'] = $_SESSION['añoactual'] - 1;
	}

	public function sumaryear(){
		$_SESSION['añoactual'] = $_SESSION['añoactual'] + 1;
	}
}