$(function(){
	$("#modeventos").addClass("active open");
	$("#reqenfermedad").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.enf_animal.value==""){
		$('input[name=enf_animal]').focus(); return 0;
	}
	if(campo.enf_tipo_enfermedad.value==""){
		$('input[name=enf_tipo_enfermedad]').focus(); return 0;
	}
	if(campo.enf_medicamentos.value==""){
		$('input[name=enf_medicamentos]').focus(); return 0;
	}
	if(campo.enf_via_aplicacion.value==""){
		$('input[name=enf_via_aplicacion]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_enfermedad').serialize(),
		url:URL+'enfermedad/guardar',
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
		url:URL+'enfermedad/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['enf_id']);
			$("select[name=enf_animal] > option[value='"+datos[0]['enf_animal']+"']").attr('selected', 'selected');
			$("select[name=enf_tipo_enfermedad] > option[value='"+datos[0]['enf_tipo_enfermedad']+"']").attr('selected', 'selected');
			$("select[name=enf_medicamentos] > option[value='"+datos[0]['enf_medicamentos']+"']").attr('selected', 'selected');
			$("select[name=enf_via_aplicacion] > option[value='"+datos[0]['enf_via_aplicacion']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['enf_fecha']);
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
			url:URL+'enfermedad/eliminar',
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
	location.href=URL+'enfermedad';
}

function nuevocancel(){
	$("#form_enfermedad").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=enf_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=enf_tipo_enfermedad] > option[value='']").attr('selected', 'selected');
	$("select[name=enf_medicamentos] > option[value='']").attr('selected', 'selected');
	$("select[name=enf_via_aplicacion] > option[value='']").attr('selected', 'selected');

}
