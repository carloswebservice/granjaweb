$(function(){
	$("#modeventos").addClass("active open");
	$("#reqindiespecialesevento").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.iee_animal.value==""){
		$('input[name=iee_animal]').focus(); return 0;
	}
	if(campo.iee_indicaciones_especiales.value==""){
		$('input[name=iee_indicaciones_especiales]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_indicaciones_ee').serialize(),
		url:URL+'indicaciones_especiales_evento/guardar',
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
		url:URL+'indicaciones_especiales_evento/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['iee_id']);
			$("select[name=iee_animal] > option[value='"+datos[0]['iee_animal']+"']").attr('selected', 'selected');
			$("select[name=iee_indicaciones_especiales] > option[value='"+datos[0]['iee_indicaciones_especiales']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['iee_fecha']);
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
			url:URL+'indicaciones_especiales_evento/eliminar',
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
	location.href=URL+'indicaciones_especiales_evento';
}

function nuevocancel(){
	$("#form_indicaciones_ee").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=iee_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=iee_indicaciones_especiales] > option[value='']").attr('selected', 'selected');


}
