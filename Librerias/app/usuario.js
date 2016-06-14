$(function(){
	$("#modseguridad").addClass("active open");
	$("#requsuarios").addClass("active");
})

function guardar(campo){
	if(campo.usu_personal.value=="personal"){
		$('#usu_personal').focus(); return 0;
	}
	if(campo.usu_tipousuario.value=="tipousuario"){
		$('#usu_tipousuario').focus();return 0;
	}
	if(campo.usu_nombre.value==""){
		$('#usu_nombre').focus(); return 0;
	}
	if(campo.usu_clave.value==""){
		$('#usu_clave').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_usuario').serialize(),
		url:URL+'usuario/guardar',
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
		url:URL+'usuario/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['usu_id']);
			$("#usu_personal > option[value='"+datos[0]['usu_personal']+"']").attr('selected', 'selected');
			$("#usu_tipousuario > option[value='"+datos[0]['usu_tipousuario']+"']").attr('selected', 'selected');
			$("#usu_nombre").val(datos[0]['usu_nombre']);
			$("#usu_clave").val(datos[0]['usu_clave']);
		}
	});
}

function eliminar(id){
	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) { 
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'usuario/eliminar',
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
	location.href=URL+'usuario';
}

function nuevocancel(){
	$("#form_usuario").trigger("reset");
}
