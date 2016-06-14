$(function(){
	$("#modeventos").addClass("active open");
	$("#reqpartos").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){
	if(campo.par_animal.value==""){
		$('input[name=par_animal]').focus(); return 0;
	}
	if(campo.par_tipo_parto.value==""){
		$('input[name=par_tipo_parto]').focus(); return 0;
	}
	if(campo.par_sexo_cria.value==""){
		$('input[name=par_sexo_cria]').focus(); return 0;
	}
	if(campo.par_estado_cria.value==""){
		$('input[name=par_estado_cria]').focus(); return 0;
	}
	if(campo.par_servicio.value==""){
		$('input[name=par_servicio]').focus(); return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_parto').serialize(),
		url:URL+'parto/guardar',
		success: function(data){
			if (data=="SuccessI") {
				$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
				$("#textomensaje").html("Se Registró Correctamente ...");
			}else{
				if (data=="ErrorI") {
					$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
					$("#textomensaje").html("No Se Registró Correctamente ...");
				}else{
					if (data=="SuccessM") {
						$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
						$("#textomensaje").html("Se Modificó Correctamente ...");
					}else{
						$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
						$("#textomensaje").html("No Se Modificó Correctamente ...");
					}
				}
			}

			$('#Alert').modal({ show:true, backdrop:'static'});
		}
	});
}

function modificar(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'parto/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['par_id']);
			$("select[name=par_animal] > option[value='"+datos[0]['par_animal']+"']").attr('selected', 'selected');
			$("select[name=par_tipo_parto] > option[value='"+datos[0]['par_tipo_parto']+"']").attr('selected', 'selected');
			$("select[name=par_estado_cria] > option[value='"+datos[0]['par_estado_cria']+"']").attr('selected', 'selected');
			$("select[name=par_sexo_cria] > option[value='"+datos[0]['par_sexo_cria']+"']").attr('selected', 'selected');
			$("select[name=par_servicio] > option[value='"+datos[0]['par_servicio']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['par_fecha']);
		}
	});
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'parto/eliminar',
			success: function(data){

				if (data=="SuccessE") {
					$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
					$("#textomensaje").html("Se Eliminó Correctamente ...");
				}else{
					$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
					$("#textomensaje").html("No Se Eliminó Correctamente ...");
				}
				$('#Alert').modal({ show:true, backdrop:'static'});
			}
		});
	}
}

function actualizar() {
	location.href=URL+'parto';
}

function nuevocancel(){
	$("#form_parto").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=par_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=par_tipo_parto] > option[value='']").attr('selected', 'selected');
	$("select[name=par_sexo_cria] > option[value='']").attr('selected', 'selected');
	$("select[name=par_estado_cria] > option[value='']").attr('selected', 'selected');
	$("select[name=par_servicio] > option[value='']").attr('selected', 'selected');


}
