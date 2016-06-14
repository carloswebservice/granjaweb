$(function(){
	$("#modeventos").addClass("active open");
	$("#reqtactorectal").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.tar_animal.value==""){
		$('input[name=tar_animal]').focus(); return 0;
	}
	if(campo.tar_diagnostico_utero.value==""){
		$('input[name=tar_diagnostico_utero]').focus(); return 0;
	}
	if(campo.tar_enfermedad_utero.value==""){
		$('input[name=tar_enfermedad_utero]').focus(); return 0;
	}
	if(campo.tar_enfermedad_ovario.value==""){
		$('input[name=tar_enfermedad_ovario]').focus(); return 0;
	}
	if(campo.tar_medicina_genital.value==""){
		$('input[name=tar_medicina_genital]').focus(); return 0;
	}
	if(campo.tar_via_aplicacion.value==""){
		$('input[name=tar_via_aplicacion]').focus(); return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_tactorectal').serialize(),
		url:URL+'tacto_rectal/guardar',
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
		url:URL+'tacto_rectal/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['tar_id']);
			$("select[name=tar_animal] > option[value='"+datos[0]['tar_animal']+"']").attr('selected', 'selected');
			$("select[name=tar_diagnostico_utero] > option[value='"+datos[0]['tar_diagnostico_utero']+"']").attr('selected', 'selected');
			$("select[name=tar_enfermedad_utero] > option[value='"+datos[0]['tar_enfermedad_utero']+"']").attr('selected', 'selected');
			$("select[name=tar_enfermedad_ovario] > option[value='"+datos[0]['tar_enfermedad_ovario']+"']").attr('selected', 'selected');
			$("select[name=tar_medicina_genital] > option[value='"+datos[0]['tar_medicina_genital']+"']").attr('selected', 'selected');
			$("select[name=tar_via_aplicacion] > option[value='"+datos[0]['tar_via_aplicacion']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['tar_fecha']);
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
			url:URL+'tacto_rectal/eliminar',
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
	location.href=URL+'tacto_rectal';
}

function nuevocancel(){
	$("#form_tactorectal").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=tar_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=tar_diagnostico_utero] > option[value='']").attr('selected', 'selected');
	$("select[name=tar_enfermedad_utero] > option[value='']").attr('selected', 'selected');
	$("select[name=tar_enfermedad_ovario] > option[value='']").attr('selected', 'selected');
	$("select[name=tar_medicina_genital] > option[value='']").attr('selected', 'selected');
	$("select[name=tar_via_aplicacion] > option[value='']").attr('selected', 'selected');

}
