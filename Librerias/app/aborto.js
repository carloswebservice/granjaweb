$(function(){
	$("#modeventos").addClass("active open");
	$("#reqaborto").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });

})

function guardar(campo){
	if(campo.abo_animal.value==""){
		$('input[name=abo_animal]').focus(); return 0;
	}
	if(campo.abo_causaaborto.value==""){
		$('input[name=abo_causaaborto]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_aborto').serialize(),
		url:URL+'aborto/guardar',
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
		url:URL+'aborto/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['abo_id']);
			/*$("#ani_id").val(datos[0]['abo_animal']);*/
			$("select[name=abo_animal] > option[value='"+datos[0]['abo_animal']+"']").attr('selected', 'selected');
			$("select[name=abo_causaaborto] > option[value='"+datos[0]['abo_causaaborto']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['abo_fecha']);
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
			url:URL+'aborto/eliminar',
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
	location.href=URL+'aborto';
}

function nuevocancel(){
	$("#form_aborto").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=abo_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=abo_causaaborto] > option[value='']").attr('selected', 'selected');
}
