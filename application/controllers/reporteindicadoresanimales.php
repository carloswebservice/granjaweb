<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Reporteindicadoresanimales extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";

		$animales=$this->modelo_base->MostrarArray("select ani_id,ani_rp, ani_nombre from animales where ani_estado=1");
		$secarpreñes = array(); $paratacto = array(); $aparir = array(); $repetidoras = array(); 
		$indicaciones=array();
		foreach ($animales as $key => $value) {
			$conindicaciones = $this->modelo_base->MostrarArray("select *from indicaciones_especiales_evento where iee_estado=1 and iee_animal=".$value["ani_id"]);
			if (count($conindicaciones)>0) {
				$indicaciones[]= $this->modelo_base->MostrarArray("select *from animales where ani_id=".$value["ani_id"]);
			}

			$partoultimo = $this->modelo_base->MostrarArray("select MAX(par_fecha) as fecha from parto where par_animal=".$value["ani_id"]);
			if ($partoultimo[0]["fecha"]!="") {
				$repetirservicio = $this->modelo_base->MostrarArray("select count(s.ser_animal) as cantidad from animales as a inner join servicio as s on(s.ser_animal=a.ani_id) where a.ani_id=".$value["ani_id"]." and s.ser_fecha>'".$partoultimo[0]["fecha"]."'");
				if ($repetirservicio[0]["cantidad"]>1) {
					$repetidoras[]= $this->modelo_base->MostrarArray("select *from animales where ani_id=".$value["ani_id"]);
				}
			}

			$preñada = $this->modelo_base->MostrarArray("select MAX(tar_fecha) as fecha from tacto_rectal where tar_animal=".$value["ani_id"]);
			if ($preñada[0]["fecha"]!="") {
				$preñada = $this->modelo_base->MostrarArray("select tar_diagnostico_utero as dxutero from tacto_rectal where tar_fecha='".$preñada[0]["fecha"]."' and tar_animal=".$value["ani_id"]);
				if ($preñada[0]["dxutero"]==1) {
					$servicio = $this->modelo_base->MostrarArray("select MAX(ser_fecha) as fecha from servicio where ser_animal=".$value["ani_id"]);
					
					$fechaini = new DateTime(date('Y-m-d')); $fechaf = new DateTime($servicio[0]["fecha"]);
					$diferencia = $fechaini->diff($fechaf);
					$dias = $fechaini->diff($fechaf)->days;
					$meses = ( $diferencia->y * 12 ) + $diferencia->m;

					if ($meses>=7) {
						$secarpreñes[] = $this->modelo_base->MostrarArray("select *from animales where ani_id=".$value["ani_id"]);
					}
					if ($dias>=45) {
						$paratacto[] = $this->modelo_base->MostrarArray("select *from animales where ani_id=".$value["ani_id"]);
					}

					$probableparto = date ( 'Y-m-d' , strtotime ('+9 month',strtotime ($servicio[0]["fecha"])));
					$fechaposible = new DateTime($probableparto);
					$diasrestantes = $fechaposible->diff($fechaini)->days;
					if ($diasrestantes<=7) {
						$aparir[] = $this->modelo_base->MostrarArray("select *from animales where ani_id=".$value["ani_id"]);
					}
				}
			}
		}
		
		//echo "<pre>";
		//print_r($dias); exit();
		$data["secarpreñes"] = $secarpreñes;
		$data["paratacto"] = $paratacto;
		$data["aparir"] = $aparir;
		$data["repetidoras"] = $repetidoras;
		$data["indicaciones"] = $indicaciones;
		$data["scripts"] = $this->cargar_js(["reporteindicadoresanimales.js"]);
		parent::index($view,$data);
	}
}