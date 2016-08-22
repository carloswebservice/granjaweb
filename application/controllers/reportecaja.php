<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reportecaja extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";
		$caja = $this->modelo_base->MostrarArray(" select * from caja order by idcaja");
		$data["caja"]=$caja;
		$data["scripts"] = $this->cargar_js(["reportecaja.js"]);
		parent::index($view,$data);
	}

	public function nuevoregistro(){
		$caja= $this->modelo_base->InsertarCaja("caja");
		echo $caja;
	}

	public function actualizarcaja(){
		foreach ($_POST["idcaja"] as $key => $value) {
			$cantidad = (double)($_POST["cantidad"][$key]);
			$compra = (double)($_POST["compra"][$key]);
			$medicina = (double)($_POST["medicina"][$key]);
			$transporte = (double)($_POST["transporte"][$key]);
			$ingreso = (double)($_POST["ingreso"][$key]);
			
			$total= $compra+$medicina+$transporte;
			$caja=$this->modelo_base->MostrarArray(" select *from caja where idcaja=".($_POST["idcaja"][$key]-1));

			if (count($caja)==0){
				$saldo=0;
				$saldo_total=$ingreso-$total;
			}else{
				$saldo = $ingreso+$caja[0]["saldo_total"];
				$saldo_total = $saldo-$total;
			}

			$data = array(
               'fecha' => $_POST["fecha"][$key],
               'cantidad' => $cantidad,
               'tipo' => $_POST["tipo"][$key],
               'estado' => $_POST["estado"][$key],
               'descripcion' => $_POST["descripcion"][$key],
               'ingreso' => $ingreso,
               'saldo' => $saldo,
               'compra' => $compra,
               'medicina' => $medicina,
               'transporte' => $transporte,
               'total' => $total,
               'saldo_total' => $saldo_total
            );
			
            $this->db->where('idcaja',$_POST["idcaja"][$key]);
			$estado= $this->db->update('caja', $data);
		}
	}
}