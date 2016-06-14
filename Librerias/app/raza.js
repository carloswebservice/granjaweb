$(function(){
	$("#modanimales").addClass("active open");
	$("#reqrazas").addClass("active");
})

function guardar(campo){
	if(campo.raz_descripcion.value==""){
		$('#raz_descripcion').focus(); return 0;
	}
	if(campo.raz_abreviatura.value==""){
		$('#raz_abreviatura').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_raza').serialize(),
		url:URL+'raza/guardar',
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
		url:URL+'raza/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['raz_id']);
			$("#raz_descripcion").val(datos[0]['raz_descripcion']);
			$("#raz_abreviatura").val(datos[0]['raz_abreviatura']);
		}
	});
}

function eliminar(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'raza/eliminar',
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

function actualizar() {
	location.href=URL+'raza';
}

function nuevocancel(){
	$("#form_raza").trigger("reset");
}
