<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once "controlador_base.php";

class Controles extends Controlador_Base{

	public function __construct(){
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index(){
		$data["controles"] = $this->modelo_base->MostrarQuery("select a.ani_id,a.ani_rp,a.ani_nombre,max(p.par_fecha)
			from animales as a inner join parto as p 
			on(a.ani_id=p.par_animal) where p.par_estado=1 group by a.ani_id,a.ani_rp,a.ani_nombre");
		$view = get_class($this)."/index";
		$data["scripts"] = $this->cargar_js(["controles.js"]);
		parent::index($view,$data);
	}

	public function guardar(){
		$this->db->where('con_fecha',$_POST["con_fecha"]);
		$this->db->delete('control');

		foreach ($_POST["con_animal"] as $key => $value) {
			$data = array(
               'con_animal' => $_POST["con_animal"][$key],
               'con_control1' => $_POST["con_control1"][$key],
               'con_control2' => $_POST["con_control2"][$key],
               'con_fecha' => $_POST["con_fecha"]
            );
			$estado= $this->db->insert('control', $data);
		}
		echo 'SuccessI';
	}

	public function informacion(){
		$animales= $this->modelo_base->MostrarArray("select a.ani_id,a.ani_rp,a.ani_nombre,max(p.par_fecha)
			from animales as a inner join parto as p 
			on(a.ani_id=p.par_animal) where p.par_estado=1 group by a.ani_id,a.ani_rp,a.ani_nombre");

		$html = ""; $scontrol1=0;$scontrol2=0;
		foreach ($animales as $value) { 
			$html .="<tr>";
	        $html .="<input type='hidden' name='con_animal[]' value='".$value['ani_id']."'>";
	        $html .="<td>".$value['ani_id']."</td>";
	        $html .="<td>".$value['ani_rp']."</td>";
	        $html .="<td>".$value['ani_nombre']."</td>";
	        $controles = $this->modelo_base->MostrarArray("select *from control where con_fecha='".$_POST["con_fecha"]."' and con_animal=".$value['ani_id']);
	        if (count($controles)>0) { 
	        	foreach ($controles as $val) {
	        		$scontrol1= $scontrol1+$val['con_control1'];$scontrol2= $scontrol2+$val['con_control2'];
		       		$html .='<td><input type="text" class="form-control" name="con_control1[]" value="'.$val['con_control1'].'"> </td>';
		        	$html .='<td><input type="text" class="form-control" name="con_control2[]" value="'.$val['con_control2'].'"> </td> ';
		       	}
	        }else{
	        	$html .='<td><input type="text" class="form-control" name="con_control1[]" value="0" onkeypress="return solo_decimales(event)"> </td>';
		        $html .='<td><input type="text" class="form-control" name="con_control2[]" value="0" onkeypress="return solo_decimales(event)"> </td> ';
	        }
	       	
	        $html .= '</tr>';
	    }
	    $html .= '<tr>';
	    $html .= '<td colspan="3">TOTALES</td>';
	    $html .= '<td id="control1">'.$scontrol1.'</td>';
	   	$html .= '<td id="control2">'.$scontrol2.'</td>';
	    $html .= '</tr>';
	    echo $html;
	}

	public function modificar(){
		$listaRaza= $this->modelo_base->Mostrar("celo","cel_id",$this->input->post("id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$eliminarRaza= $this->modelo_base->Eliminar(["celo","cel_id","cel_estado"]);
		$this->modelo_base->eliminar_evento("celo","cel_id","cel_animal","celo");
		echo $eliminarRaza;
	}
}