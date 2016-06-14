$(function(){
	$("#modeventos").addClass("active open");
	$("#reqmuerte").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.mue_animal.value==""){
		$('input[name=mue_animal]').focus(); return 0;
	}
	if(campo.mue_espec_muerte.value==""){
		$('input[name=mue_espec_muerte]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_muerte').serialize(),
		url:URL+'muerte/guardar',
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
		url:URL+'muerte/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['mue_id']);
			$("select[name=mue_animal] > option[value='"+datos[0]['mue_animal']+"']").attr('selected', 'selected');
			$("select[name=mue_espec_muerte] > option[value='"+datos[0]['mue_espec_muerte']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['mue_fecha']);
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
			url:URL+'muerte/eliminar',
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
	location.href=URL+'muerte';
}

function nuevocancel(){

	$("#form_muerte").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=mue_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=mue_espec_muerte] > option[value='']").attr('selected', 'selected');

}
