$(function(){
	$("#modeventos").addClass("active open");
	$("#reqsecado").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.sec_animal.value==""){
		$('input[name=sec_animal]').focus(); return 0;
	}
	if(campo.sec_med_cuartos_mamarios.value==""){
		$('input[name=sec_med_cuartos_mamarios]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_secado').serialize(),
		url:URL+'secado/guardar',
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
		url:URL+'secado/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['sec_id']);
			$("select[name=sec_animal] > option[value='"+datos[0]['sec_animal']+"']").attr('selected', 'selected');
			$("select[name=sec_med_cuartos_mamarios] > option[value='"+datos[0]['sec_med_cuartos_mamarios']+"']").attr('selected', 'selected');
				$("#fechaevento").val(datos[0]['sec_fecha']);
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
			url:URL+'secado/eliminar',
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
	location.href=URL+'secado';
}

function nuevocancel(){
	$("#form_secado").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=sec_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=sec_med_cuartos_mamarios] > option[value='']").attr('selected', 'selected');

}
