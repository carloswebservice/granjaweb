$(function(){
	$("#modeventos").addClass("active open");
	$("#reqrechazo").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.rec_animal.value==""){
		$('input[name=rec_animal]').focus(); return 0;
	}
	if(campo.rec_causa_rechazo.value==""){
		$('input[name=rec_causa_rechazo]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_rechazo').serialize(),
		url:URL+'rechazo/guardar',
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
		url:URL+'rechazo/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['rec_id']);
			$("select[name=rec_animal] > option[value='"+datos[0]['rec_animal']+"']").attr('selected', 'selected');
			$("select[name=rec_causa_rechazo] > option[value='"+datos[0]['rec_causa_rechazo']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['rec_fecha']);
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
			url:URL+'rechazo/eliminar',
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
	location.href=URL+'rechazo';
}

function nuevocancel(){
	$("#form_rechazo").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=rec_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=rec_causa_rechazo] > option[value='']").attr('selected', 'selected');

}
