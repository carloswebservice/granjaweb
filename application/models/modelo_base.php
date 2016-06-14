<?php
	class Modelo_Base extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function Mostrar($tabla,$campo,$parametro){
			$query = $this->db->get_where($tabla, array($campo => $parametro));
			return $query->result();
		}

		public function MostrarArray($query){
			$query = $this->db->query($query);
			return $query->result_array();
		}

		public function MostrarQuery($query){
			$query = $this->db->query($query);
			return $query->result();
		}

		public function Insertar($tabla,$campos){
			for($i = 0 ; $i < count($campos); $i++) {
				$data[$campos[$i]] = $this->input->post($campos[$i]);
			}
			$estado = $this->db->insert($tabla, $data);
			$this->registrar_log("insertar",$tabla);

			if ($estado) {
				return "SuccessI";
			}else{
				return "ErrorI";
			}
		}

		public function Modificar($tabla,$campos,$id){
			for($i = 0 ; $i < count($campos); $i++) {
				$data[$campos[$i]] = $this->input->post($campos[$i]);
			}
			$this->db->where($id, $this->input->post("id"));
			$estado= $this->db->update($tabla, $data);
			$this->registrar_log("modificar",$tabla);
			if ($estado) {
				return "SuccessM";
			}else{
				return "ErrorM";
			}
		}

		public function Eliminar($array){
			$data = array(
               $array[2] => 0
            );
			$this->db->where($array[1], $this->input->post("id"));
			$estado= $this->db->update($array[0], $data);
			$this->registrar_log("eliminar",$array[0]);
			if ($estado) {
				return "SuccessE";
			}else{
				return "ErrorE";
			}
		}

		public function eliminar_evento($tabla,$id,$ani_id,$evento)
		{
			$r = $this->db->get_where($tabla,array($id => $this->input->post("id")))->row();
			$r2 = $this->db->get_where("evento",array("eve_descripcion" => $evento))->row();
			$eve_id = $r2->eve_id;
			$ani_id = $r->$ani_id;
			$data = array(
               "eveani_estado" => 0
            );
            $this->db->where("eveani_evento", $eve_id);
            $this->db->where("eveani_animal", $ani_id);
            $this->db->where("eveani_refevento", $this->input->post("id"));
			$this->db->update("eventoanimal", $data);
		}

		public function InsertarCalendar($tabla,$campos){
			for($i = 0 ; $i < count($campos); $i++) {
				if ($i==0) {
					if(isset($_POST["ani_id"])) {
						$data[$campos[$i]] = $_POST["ani_id"];
						$ani_id = $_POST["ani_id"];
					}else{
						$data[$campos[$i]] = $this->input->post($campos[$i]);
						$ani_id = $this->input->post($campos[$i]);
					}
				}else{
					if($i==(count($campos)-1)){
						$data[$campos[$i]] = $_POST["fechaevento"];
					}else{
						$data[$campos[$i]] = $this->input->post($campos[$i]);
					}
				}
			}
			$this->registrar_log("insertar",$tabla);
			/*print_r($data);*/
			$estado = $this->db->insert($tabla, $data);
			// Grabamos en la tabla evento animal
			$idrefevento = $this->db->insert_id();
			$data = array(
               'eveani_animal' => $ani_id,
               'eveani_evento' => $_POST["evento"],
               'eveani_fecha' => $_POST["fechaevento"],
               'eveani_refevento' => $idrefevento
            );
            	/*print_r($data); exit;*/
			$estado= $this->db->insert('eventoanimal', $data);
			$this->registrar_log("insertar","eventoanimal");
			if ($estado) {
				return "SuccessI";
			}else{
				return "ErrorI";
			}
		}

		public function ModificarCalendar($tabla,$campos,$id,$band = null)
		{
			for($i = 0 ; $i < count($campos); $i++) {
				if ($i==0) {
					$data[$campos[$i]] = $this->input->post($campos[$i]);
					$ani_id = $this->input->post($campos[$i]);
				}else{
					if($i==(count($campos)-1)){
						$data[$campos[$i]] = str_replace(' ', '', $_POST["fechaevento"]);
					}else{
						$data[$campos[$i]] = $this->input->post($campos[$i]);
					}
				}
			}
			if($band != null ) {
				$r = $this->db->get_where($tabla,array($id => $_POST["id"]))->row();
				$ant_ani_id = $r->$band;
				$id_evento = $_POST["id"];
			}else{
				$id_evento = $_POST["refevento"];
			}
/*			print_r($id_evento);
			print_r($data);*/

			$this->db->where($id, $id_evento);
			$estado = $this->db->update($tabla, $data);
			$this->registrar_log("modificar",$tabla);

			// Actualizamos en la tabla evento animal
			if($band == null) {
				$data = array(
	               'eveani_fecha' => str_replace(' ', '', $_POST["fechaevento"])
	            );

	            $this->db->where('eveani_id', $_POST["id"]);
				$estado = $this->db->update('eventoanimal', $data);
					/*print_r($data);*/
				$this->registrar_log("modificar","eventoanimal");

			}else{
				$data = array(
					'eveani_fecha' => str_replace(' ', '', $_POST["fechaevento"]),
					'eveani_animal' => $ani_id
					);
			/*	print_r($data); exit;*/
				$this->modificar_eventos($data,$_POST["evento"],$ant_ani_id,$_POST["id"]);
			}

			if ($estado==1) {
				return "SuccessM";
			}else{
				return "ErrorM";
			}


		}

		public function modificar_eventos($data,$eve_id,$ani_id,$ref_id)
		{
            $this->db->where("eveani_evento", $eve_id);
            $this->db->where("eveani_animal", $ani_id);
            $this->db->where("eveani_refevento", $ref_id);

			$this->db->update("eventoanimal", $data);

			$this->registrar_log("modificar","eventoanimal");
		}

		public function traer_modulos() {
			$this->db->select("h.mod_id as idpadre, h.mod_descripcion as padre, pa.mod_descripcion as hijo, pa.mod_id as idhijo,h.mod_icono as icono,pa.mod_icono as iconoh, pa.mod_url as url,h.mod_ref_id as id_padre, pa.mod_ref_id as id_hijo"
			);
			$this->db->from("modulo as h");
			$this->db->join("modulo as pa", "h.mod_id=pa.mod_padre");
			$this->db->join("permisos as p", "p.per_modulo=pa.mod_id");
			$this->db->join("tipo_usuario as tu", "tu.tiu_id=p.per_tipousuario");
			$this->db->where("tu.tiu_id", $_SESSION["tipousuario"]);
			$this->db->where("pa.mod_estado", "1");
			$this->db->order_by("h.mod_id", "asc");
			$r = $this->db->get();
			return $r->result();
		}

		public function registrar_log($accion,$tabla=null){
			$data = array(
				"log_usuario" => $_SESSION["personal"],
				"log_fecha" => date("Y-m-d H:i:s"),
				"log_accion" => $accion,
				"log_tabla" => $tabla
			);
			$this->db->insert("log_transacciones",$data);
		}
	}
?>