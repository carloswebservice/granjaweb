$(function(){
	$("#modanimales").addClass("active open");
	$("#reqcausaaborto").addClass("active");
})

function guardar(campo){

	if(campo.cab_descripcion.value==""){
		$('input[name=cab_descripcion]').focus(); return 0;
	}
	if(campo.cab_abreviatura.value==""){
		$('input[name=cab_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_causa_aborto').serialize(),
		url:URL+'causa_aborto/guardar',
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
		url:URL+'causa_aborto/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['cab_id']);
			$("input[name=cab_descripcion]").val(datos[0]['cab_descripcion']);
			$("input[name=cab_abreviatura]").val(datos[0]['cab_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'causa_aborto/eliminar',
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
	location.href=URL+'causa_aborto';
}

function nuevocancel(){
	$("#form_causa_aborto").trigger("reset");

}

