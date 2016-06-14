<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Calendario extends Controlador_Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$view = get_class($this)."/index";

		$Animales['animal']=$this->modelo_base->MostrarArray("select *from animales where ani_estado=1");
		foreach ($Animales['animal'] as $key => $value) {
			$query = "select ea.*,e.*from animales as a inner join eventoanimal as ea on(a.ani_id=ea.eveani_animal) inner join evento as e on (e.eve_id=ea.eveani_evento)
				where ea.eveani_estado=1 and a.ani_id=".$value['ani_id'];

			$Animales['animal'][$key]['eventos']=$this->modelo_base->MostrarArray($query);
		}

		$data["Animales"] = $Animales;
		$data["Eventos"] = $this->modelo_base->Mostrar("evento","eve_estado",1);

		$data["TipoServicios"] = $this->modelo_base->Mostrar("tipo_servicio","tps_estado",1);

		$data["Reproductores"] = $this->modelo_base->Mostrar("reproductor","rep_estado",1);
		$data["CausaAbortos"] = $this->modelo_base->Mostrar("causa_aborto","cab_estado",1);

		$data["EspMuerte"] = $this->modelo_base->Mostrar("especificacion_de_muerte","edm_estado",1);

		$data["EspVenta"] = $this->modelo_base->Mostrar("especificacion_de_venta","edv_estado",1);

		$data["MedGenital"] = $this->modelo_base->Mostrar("medicina_genital","mdg_estado",1);
		$data["CausaNoInse"] = $this->modelo_base->Mostrar("causa_no_inseminal","cni_estado",1);
		$data["ViaAplicaciones"] = $this->modelo_base->Mostrar("via_aplicacion","vap_estado",1);

		$data["TipoPartos"] = $this->modelo_base->Mostrar("tipo_parto","tpa_estado",1);
		$data["EstadoCrias"] = $this->modelo_base->Mostrar("estado_cria","etc_estado",1);
		$data["SexoCrias"] = $this->modelo_base->Mostrar("sexo_cria","scr_estado",1);
		$queryservicio = "select s.*,ts.tps_descripcion as tipo_servicio from servicio as s inner join tipo_servicio as ts
		on(s.ser_tipo_servicio=ts.tps_id) where s.ser_estado=1";
		$data["Servicios"] = $this->modelo_base->MostrarQuery($queryservicio);

		$data["MedCuartos"] = $this->modelo_base->Mostrar("med_cuartos_mamarios","mdm_estado",1);

		$data["CausaRechazo"] = $this->modelo_base->Mostrar("causa_rechazo","car_estado",1);

		$data["Medicamentos"] = $this->modelo_base->Mostrar("medicamentos","med_estado",1);

		$data["IndicacionesEspeciales"] = $this->modelo_base->Mostrar("indicaciones_especiales","ide_estado",1);

		$data["TipoEnfermedad"] = $this->modelo_base->Mostrar("tipo_enfermedad","tpe_estado",1);

		$data["TipoAnalisis"] = $this->modelo_base->Mostrar("tipo_analisis","tpa_estado",1);
		$data["ResultadoAnalisis"] = $this->modelo_base->Mostrar("resultado_analisis","res_estado",1);

		$data["DiagnosticoUtero"] = $this->modelo_base->Mostrar("diagnostico_utero","dgu_estado",1);
		$data["EnfermedadUtero"] = $this->modelo_base->Mostrar("enfermedad_utero","efu_estado",1);
		$data["EnfermedadOvario"] = $this->modelo_base->Mostrar("enfermedad_ovario","efo_estado",1);

		$data["scripts"] = $this->cargar_js(["calendario.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		if ($this->input->post("id")=="") {
			// Grabamos Un Parto
			if ($_POST["evento"]==1) {
				$campos = ["par_animal","par_tipo_parto","par_estado_cria","par_sexo_cria","par_servicio","par_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("parto",$campos);
			}
			// Grabamos Un Aborto
			if ($_POST["evento"]==2) {
				$campos = ["abo_animal","abo_causaaborto","abo_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("aborto",$campos);
			}
			// Grabamos Un Celo
			if ($_POST["evento"]==3) {
				$campos = ["cel_animal","cel_causa_no_inseminal","cel_medicina_genital","cel_via_aplicacion","cel_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("celo",$campos);
			}
			// Grabamos Un Servicio
			if ($_POST["evento"]==4) {
				$campos = ["ser_animal","ser_reproductor","ser_personal","ser_tipo_servicio","ser_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("servicio",$campos);
			}
			// Grabamos Una Muerte
			if ($_POST["evento"]==5) {
				$campos = ["mue_animal","mue_espec_muerte","mue_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("muerte",$campos);
			}
			// Grabamos Una Venta
			if ($_POST["evento"]==6) {
				$campos = ["ven_animal","ven_especificacion_venta","ven_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("venta",$campos);
			}
			// Grabamos Un Secado
			if ($_POST["evento"]==7) {
				$campos = ["sec_animal","sec_med_cuartos_mamarios","sec_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("secado",$campos);
			}
			// Grabamos Un Rechazo
			if ($_POST["evento"]==8) {
				$campos = ["rec_animal","rec_causa_rechazo","rec_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("rechazo",$campos);
			}
			// Grabamos Una Medicacion
			if ($_POST["evento"]==9) {
				$campos = ["mec_animal","mec_medicamentos","mec_via_aplicacion","mec_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("medicacion",$campos);
			}
			// Grabamos Una indicacion especial
			if ($_POST["evento"]==10) {
				$campos = ["iee_animal","iee_indicaciones_especiales","iee_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("indicaciones_especiales_evento",$campos);
			}
			// Grabamos Una Enfermedad
			if ($_POST["evento"]==11) {
				$campos = ["enf_animal","enf_tipo_enfermedad","enf_medicamentos","enf_via_aplicacion","enf_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("enfermedad",$campos);
			}
			// Grabamos Un Analisis
			if ($_POST["evento"]==12) {
				$campos = ["ana_animal","ana_tipo_analisis","ana_resultado_analisis","ana_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("analisis",$campos);
			}
			// Grabamos Un Tacto Rectal
			if ($_POST["evento"]==13) {
				$campos = ["tar_animal","tar_diagnostico_utero","tar_enfermedad_utero","tar_enfermedad_ovario","tar_medicina_genital","tar_via_aplicacion","tar_fecha"];
				$guardarEvento= $this->modelo_base->InsertarCalendar("tacto_rectal",$campos);
			}
			echo $guardarEvento;
		}else{
			// Actualizamos Un Parto
			if ($_POST["evento"]==1) {
				$campos = ["par_tipo_parto","par_estado_cria","par_sexo_cria","par_servicio","par_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("parto",$campos,"par_id");
			}
			// Actualizamos Un Servicio
			if ($_POST["evento"]==2) {
				$campos = ["abo_causaaborto","abo_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("aborto",$campos,"abo_id");
			}
			// Actualizamos Un Celo
			if ($_POST["evento"]==3) {
				$campos = ["cel_causa_no_inseminal","cel_medicina_genital","cel_via_aplicacion","cel_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("celo",$campos,"cel_id");
			}
			// Actualizamos Un Servicio
			if ($_POST["evento"]==4) {
				$campos = ["ser_reproductor","ser_personal","ser_tipo_servicio","ser_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("servicio",$campos,"ser_id");
			}
			// Actualizamos Una Muerte
			if ($_POST["evento"]==5) {
				$campos = ["mue_espec_muerte","mue_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("muerte",$campos,"mue_id");
			}
			// Actualizamos Una Venta
			if ($_POST["evento"]==6) {
				$campos = ["ven_especificacion_venta","ven_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("venta",$campos,"ven_id");
			}
			// Actualizamos Un Secado
			if ($_POST["evento"]==7) {
				$campos = ["sec_med_cuartos_mamarios","sec_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("secado",$campos,"sec_id");
			}
			// Actualizamos Un Rechazo
			if ($_POST["evento"]==8) {
				$campos = ["rec_causa_rechazo","rec_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("rechazo",$campos,"rec_id");
			}
			// Actualizamos Una Medicacion
			if ($_POST["evento"]==9) {
				$campos = ["mec_medicamentos","mec_via_aplicacion","mec_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("medicacion",$campos,"mec_id");
			}
			// Actualizamos Una Indicacion Especial
			if ($_POST["evento"]==10) {
				$campos = ["iee_indicaciones_especiales","iee_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("indicaciones_especiales_evento",$campos,"iee_id");
			}
			// Actualizamos Una Enfermedad
			if ($_POST["evento"]==11) {
				$campos = ["enf_tipo_enfermedad","enf_medicamentos","enf_via_aplicacion","enf_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("enfermedad",$campos,"enf_id");
			}
			// Actualizamos Un Analisis
			if ($_POST["evento"]==12) {
				$campos = ["ana_tipo_analisis","ana_resultado_analisis","ana_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("analisis",$campos,"ana_id");
			}
			// Actualizamos Un Tacto Rectal
			if ($_POST["evento"]==13) {
				$campos = ["tar_diagnostico_utero","tar_enfermedad_utero","tar_enfermedad_ovario","tar_medicina_genital","tar_via_aplicacion","tar_fecha"];
				$modificarEvento= $this->modelo_base->ModificarCalendar("tacto_rectal",$campos,"tar_id");
			}
			echo $modificarEvento;
		}
	}

	public function modificar(){
		// El evento es un parto
		if($_POST["evento"]==1){
			$listaEvento = $this->modelo_base->Mostrar("parto","par_id",$_POST["refevento_id"]);
		}
		// El evento es un aborto
		if($_POST["evento"]==2){
			$listaEvento = $this->modelo_base->Mostrar("aborto","abo_id",$_POST["refevento_id"]);
		}
		// El evento es un celo
		if($_POST["evento"]==3){
			$listaEvento = $this->modelo_base->Mostrar("celo","cel_id",$_POST["refevento_id"]);
		}
		// El evento es un servicio
		if($_POST["evento"]==4){
			$listaEvento = $this->modelo_base->Mostrar("servicio","ser_id",$_POST["refevento_id"]);
		}
		// El evento es una muerte
		if($_POST["evento"]==5){
			$listaEvento = $this->modelo_base->Mostrar("muerte","mue_id",$_POST["refevento_id"]);
		}
		// El evento es una venta
		if($_POST["evento"]==6){
			$listaEvento = $this->modelo_base->Mostrar("venta","ven_id",$_POST["refevento_id"]);
		}
		// El evento es una secado
		if($_POST["evento"]==7){
			$listaEvento = $this->modelo_base->Mostrar("secado","sec_id",$_POST["refevento_id"]);
		}
		// El evento es una rechazo
		if($_POST["evento"]==8){
			$listaEvento = $this->modelo_base->Mostrar("rechazo","rec_id",$_POST["refevento_id"]);
		}
		// El evento es una medicacion
		if($_POST["evento"]==9){
			$listaEvento = $this->modelo_base->Mostrar("medicacion","mec_id",$_POST["refevento_id"]);
		}
		// El evento es una indicacion especial
		if($_POST["evento"]==10){
			$listaEvento = $this->modelo_base->Mostrar("indicaciones_especiales_evento","iee_id",$_POST["refevento_id"]);
		}
		// El evento es una indicacion especial
		if($_POST["evento"]==11){
			$listaEvento = $this->modelo_base->Mostrar("enfermedad","enf_id",$_POST["refevento_id"]);
		}
		// El evento es un analisis
		if($_POST["evento"]==12){
			$listaEvento = $this->modelo_base->Mostrar("analisis","ana_id",$_POST["refevento_id"]);
		}
		// El evento es un tacto rectal
		if($_POST["evento"]==13){
			$listaEvento = $this->modelo_base->Mostrar("tacto_rectal","tar_id",$_POST["refevento_id"]);
		}
		echo json_encode($listaEvento);
	}
}