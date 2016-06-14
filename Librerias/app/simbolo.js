$(function(){
	$("#modcalendario").addClass("active open");
	$("#reqsimbolo").addClass("active");
});

$("#eve_simbolo").on("click",function(){
	$('#iconos').modal({ show:true, backdrop:'static'});
});


$('#icono ul li i').click(function(){
    //alert($(this).attr('class'));
    $("#eve_simbolo").val($(this).attr('class'));
    $('#iconos').modal("hide");
});

function guardar(campo){
	if(campo.eve_descripcion.value==""){
		$('#eve_descripcion').focus(); return 0;
	}
	if(campo.eve_simbolo.value==""){
		$('#eve_simbolo').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_simbolo').serialize(),
		url:URL+'simbolo/guardar',
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
		url:URL+'simbolo/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['eve_id']);
			$("#eve_descripcion").val(datos[0]['eve_descripcion']);
			$("#eve_simbolo").val(datos[0]['eve_simbolo']);
			$("#eve_color").val(datos[0]['eve_color']);
		}
	});
}

function eliminar(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'simbolo/eliminar',
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
	location.href=URL+'simbolo';
}

function nuevocancel(){
	$("#form_simbolo").trigger("reset");
}
