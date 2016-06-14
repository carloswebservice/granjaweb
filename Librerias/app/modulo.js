$(function(){
	$("#modseguridad").addClass("active open");
	$("#reqmodulos").addClass("active");
})

function guardar(campo){
	if(campo.mod_descripcion.value==""){
		$('#mod_descripcion').focus(); return 0;
	}
	if(campo.mod_url.value==""){
		$('#mod_url').focus();return 0;
	}
	if(campo.mod_icono.value==""){
		$('#mod_icono').focus(); return 0;
	}
	if(campo.mod_padre.value=="modpadre"){
		$('#mod_padre').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_modulo').serialize(),
		url:URL+'modulo/guardar',
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
		url:URL+'modulo/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['mod_id']);
			$("#mod_descripcion").val(datos[0]['mod_descripcion']);
			$("#mod_url").val(datos[0]['mod_url']);
			$("#mod_icono").val(datos[0]['mod_icono']);
			$("#mod_padre > option[value='"+datos[0]['mod_padre']+"']").attr('selected', 'selected');
		}
	});
}

function eliminar(id){
	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'modulo/eliminar',
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
	location.href=URL+'modulo';
}

function nuevocancel(){
	$("#form_modulo").trigger("reset");
}
