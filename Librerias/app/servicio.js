$(function(){
	$("#modeventos").addClass("active open");
	$("#reqservicio").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.ser_animal.value==""){
		$('input[name=ser_animal]').focus(); return 0;
	}
	if(campo.ser_reproductor.value==""){
		$('input[name=ser_reproductor]').focus(); return 0;
	}
	if(campo.ser_personal.value==""){
		$('input[name=ser_personal]').focus(); return 0;
	}
	if(campo.ser_tipo_servicio.value==""){
		$('input[name=ser_tipo_servicio]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_servicio').serialize(),
		url:URL+'servicio/guardar',
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
		url:URL+'servicio/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['ser_id']);
			$("select[name=ser_animal] > option[value='"+datos[0]['ser_animal']+"']").attr('selected', 'selected');
			$("select[name=ser_reproductor] > option[value='"+datos[0]['ser_reproductor']+"']").attr('selected', 'selected');
			$("select[name=ser_personal] > option[value='"+datos[0]['ser_personal']+"']").attr('selected', 'selected');
			$("select[name=ser_tipo_servicio] > option[value='"+datos[0]['ser_tipo_servicio']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['ser_fecha']);
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
			url:URL+'servicio/eliminar',
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
	location.href=URL+'servicio';
}

function nuevocancel(){
	$("#form_servicio").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=ser_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=ser_reproductor] > option[value='']").attr('selected', 'selected');
	$("select[name=ser_personal] > option[value='']").attr('selected', 'selected');
	$("select[name=ser_tipo_servicio] > option[value='']").attr('selected', 'selected');

}
