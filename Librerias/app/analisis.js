$(function(){
	$("#modanimales").addClass("active open");
	$("#reqanalisis").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.ana_animal.value==""){
		$('input[name=ana_animal]').focus(); return 0;
	}
	if(campo.ana_tipo_analisis.value==""){
		$('input[name=ana_tipo_analisis]').focus(); return 0;
	}
	if(campo.ana_resultado_analisis.value==""){
		$('input[name=ana_resultado_analisis]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_analisis').serialize(),
		url:URL+'analisis/guardar',
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
		url:URL+'analisis/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['ana_id']);
			$("select[name=ana_animal] > option[value='"+datos[0]['ana_animal']+"']").attr('selected', 'selected');
			$("select[name=ana_tipo_analisis] > option[value='"+datos[0]['ana_tipo_analisis']+"']").attr('selected', 'selected');
			$("select[name=ana_resultado_analisis] > option[value='"+datos[0]['ana_resultado_analisis']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['ana_fecha']);
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
			url:URL+'analisis/eliminar',
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
	location.href=URL+'analisis';
}

function nuevocancel(){
	$("#form_analisis").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=ana_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=ana_tipo_analisis] > option[value='']").attr('selected', 'selected');
	$("select[name=ana_resultado_analisis] > option[value='']").attr('selected', 'selected');
}
