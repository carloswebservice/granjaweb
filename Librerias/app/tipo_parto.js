$(function(){
	$("#modanimales").addClass("active open");
	$("#reqtipoparto").addClass("active");
})

function guardar(campo){

	if(campo.tpa_descripcion.value==""){
		$('input[name=tpa_descripcion]').focus(); return 0;
	}
	if(campo.tpa_abreviatura.value==""){
		$('input[name=tpa_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_tipo_parto').serialize(),
		url:URL+'tipo_parto/guardar',
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

function modifitpa(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'tipo_parto/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['tpa_id']);
			$("input[name=tpa_descripcion]").val(datos[0]['tpa_descripcion']);
			$("input[name=tpa_abreviatura]").val(datos[0]['tpa_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'tipo_parto/eliminar',
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
	location.href=URL+'tipo_parto';
}

function nuevocancel(){
	$("#form_tipo_parto").trigger("reset");

}

