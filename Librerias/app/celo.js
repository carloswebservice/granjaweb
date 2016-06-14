$(function(){
	$("#modeventos").addClass("active open");
	$("#reqcelo").addClass("active");

	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });

})

function guardar(campo){

	if(campo.cel_animal.value==""){
		$('input[name=cel_animal]').focus(); return 0;
	}
	if(campo.cel_causa_no_inseminal.value==""){
		$('input[name=cel_causa_no_inseminal]').focus(); return 0;
	}
	if(campo.cel_medicina_genital.value==""){
		$('input[name=cel_medicina_genital]').focus(); return 0;
	}
	if(campo.cel_via_aplicacion.value==""){
		$('input[name=cel_via_aplicacion]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_celo').serialize(),
		url:URL+'celo/guardar',
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
		url:URL+'celo/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['cel_id']);
			$("select[name=cel_animal] > option[value='"+datos[0]['cel_animal']+"']").attr('selected', 'selected');
			$("select[name=cel_causa_no_inseminal] > option[value='"+datos[0]['cel_causa_no_inseminal']+"']").attr('selected', 'selected');
			$("select[name=cel_medicina_genital] > option[value='"+datos[0]['cel_medicina_genital']+"']").attr('selected', 'selected');
			$("select[name=cel_via_aplicacion] > option[value='"+datos[0]['cel_via_aplicacion']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['cel_fecha']);
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
			url:URL+'celo/eliminar',
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
	location.href=URL+'celo';
}

function nuevocancel(){
	$("#form_celo").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });

	$("select[name=cel_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=cel_causa_no_inseminal] > option[value='']").attr('selected', 'selected');
	$("select[name=cel_medicina_genital] > option[value='']").attr('selected', 'selected');
	$("select[name=cel_via_aplicacion] > option[value='']").attr('selected', 'selected');

}
