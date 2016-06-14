$(function(){
	$("#modeventos").addClass("active open");
	$("#reqmedicacion").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.mec_animal.value==""){
		$('input[name=mec_animal]').focus(); return 0;
	}
	if(campo.mec_medicamentos.value==""){
		$('input[name=mec_medicamentos]').focus(); return 0;
	}
	if(campo.mec_via_aplicacion.value==""){
		$('input[name=mec_via_aplicacion]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_medicacion').serialize(),
		url:URL+'medicacion/guardar',
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
		url:URL+'medicacion/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['mec_id']);
			$("select[name=mec_animal] > option[value='"+datos[0]['mec_animal']+"']").attr('selected', 'selected');
			$("select[name=mec_medicamentos] > option[value='"+datos[0]['mec_medicamentos']+"']").attr('selected', 'selected');
			$("select[name=mec_via_aplicacion] > option[value='"+datos[0]['mec_via_aplicacion']+"']").attr('selected', 'selected');
				$("#fechaevento").val(datos[0]['mec_fecha']);
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
			url:URL+'medicacion/eliminar',
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
	location.href=URL+'medicacion';
}

function nuevocancel(){
	$("#form_medicacion").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=mec_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=mec_medicamentos] > option[value='']").attr('selected', 'selected');
	$("select[name=mec_via_aplicacion] > option[value='']").attr('selected', 'selected');
}
