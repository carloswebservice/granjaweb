$(function(){
	$("#modeventos").addClass("active open");
	$("#reqreganalisis").addClass("active");
})

function guardar(campo){

	if(campo.rga_animal.value==""){
		$('input[name=rga_animal]').focus(); return 0;
	}
	if(campo.rga_tipo_analisis.value==""){
		$('input[name=rga_tipo_analisis]').focus(); return 0;
	}
	if(campo.rga_resultado_analisis.value==""){
		$('input[name=rga_resultado_analisis]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_registro').serialize(),
		url:URL+'reganalisis/guardar',
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
		url:URL+'reganalisis/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['rga_id']);
			$("select[name=rga_animal] > option[value='"+datos[0]['rga_animal']+"']").attr('selected', 'selected');
			$("select[name=rga_tipo_analisis] > option[value='"+datos[0]['rga_tipo_analisis']+"']").attr('selected', 'selected');
			$("select[name=rga_resultado_analisis] > option[value='"+datos[0]['rga_resultado_analisis']+"']").attr('selected', 'selected');

		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'reganalisis/eliminar',
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
	location.href=URL+'reganalisis';
}

function nuevocancel(){
	$("select[name=rga_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=rga_tipo_analisis] > option[value='']").attr('selected', 'selected');
	$("select[name=rga_resultado_analisis] > option[value='']").attr('selected', 'selected');

}
