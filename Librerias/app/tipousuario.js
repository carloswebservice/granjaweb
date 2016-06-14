$(function(){
	$("#modseguridad").addClass("active open");
	$("#reqpermisos").addClass("active");

	$('.tree-toggle').click(function () {
		$(this).parent().children('ul.tree').toggle(200);
	});
})

function permisos(tiu_id){
	$("#tiu_id").val(tiu_id);
	$.ajax({
		type:"POST",
		data:"tiu_id="+tiu_id,
		url:URL+'tipousuario/getmodulos',
		success: function(data){
			$("#cargamodulos").empty();
            $("#cargamodulos").append(data);
		}
	});
	$("#permisos").modal({ show:true, backdrop:'static'});
}

function grabar(){
	$.ajax({
		type:"POST",
		data:$('#form_permisos').serialize(),
		url:URL+'tipousuario/grabar',
		success: function(data){
			$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
			$("#textomensaje").html("Se Registró Correctamente ...");
			$('#Alert').modal({ show:true, backdrop:'static'});
		}
	});
}

function guardar(campo){
	if(campo.tiu_descripcion.value==""){
		$('#tiu_descripcion').focus(); return 0;
	}
	if(campo.tiu_abreviatura.value==""){
		$('#tiu_abreviatura').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_tipousuario').serialize(),
		url:URL+'tipousuario/guardar',
		success: function(data){
			if (data=="SuccessI") {
				$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
				$("#textomensaje").html("Permisos Asignados Correctamente ...");
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
		url:URL+'tipousuario/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['tiu_id']);
			$("#tiu_descripcion").val(datos[0]['tiu_descripcion']);
			$("#tiu_abreviatura").val(datos[0]['tiu_abreviatura']);
		}
	});
}

function eliminar(id){
	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'tipousuario/eliminar',
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
	location.href=URL+'tipousuario';
}

function nuevocancel(){
	$("#form_tipousuario").trigger("reset");
}