$(function(){
	$("#modanimales").addClass("active open");
	$("#reqanimal").addClass("active");
})

$("#nacimiento").click(function(){
	$("#proveedor").hide();
	$("#ani_tiporeg").val("2");
})

$("#compra").click(function(){
	$("#proveedor").show();
	$("#ani_tiporeg").val("1");
})

function guardar(campo){
	if(campo.ani_rp.value==""){
		$('#ani_rp').focus(); return 0;
	}
	if(campo.ani_nombre.value==""){
		$('#ani_nombre').focus();return 0;
	}
	if(campo.ani_raza.value=="raza"){
		$('#ani_raza').focus(); return 0;
	}
	if(campo.ani_madre.value==""){
		$('#ani_madre').focus();return 0;
	}
	if(campo.ani_padre.value==""){
		$('#ani_padre').focus();return 0;
	}
	if(campo.ani_fechanac.value==""){
		$('#ani_fechanac').focus();return 0;
	}
	if(campo.ani_sexo.value==""){
		alert("Seleccione Sexo");return 0;
	}
	if(campo.ani_tiporeg.value==1){
		if(campo.ani_proveedor.value==""){
			$('#ani_proveedor').focus();return 0;
		}
	}
	if(campo.ani_descripcion.value==""){
		$('#ani_descripcion').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$("#form_animal").serialize(),
		url:URL+'animal/guardar',
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
		url:URL+'animal/modificar',
		success: function(data){
			var datos = eval(data);
			if (datos[0]['ani_tiporeg']==1) {
				$("#compra").css("color","#1caf9a");
			}else{
				$("#nacimiento").css("color","#1caf9a");
			}
			$("#id").val(datos[0]['ani_id']);
			$("#ani_rp").val(datos[0]['ani_rp']);
			$("#ani_nombre").val(datos[0]['ani_nombre']);
			$("#ani_raza > option[value='"+datos[0]['ani_raza']+"']").attr('selected', 'selected');
            if (datos[0]['ani_sexo']=="M") {
            	$("#macho").attr('checked', 'checked');
            }else{
            	$("#hembra").attr('checked', 'checked');
            }
            $("#ani_madre").val(datos[0]['ani_madre']);
            $("#ani_madre").val(datos[0]['ani_madre']);
			$("#ani_padre").val(datos[0]['ani_padre']);
			$("#ani_fechanac").val(datos[0]['ani_fechanac']);
			$("#ani_proveedor").val(datos[0]['ani_proveedor']);
			$("#ani_descripcion").val(datos[0]['ani_descripcion']);
		}
	});
}

function eliminar(id){
	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) { 
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'animal/eliminar',
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
	location.href=URL+'animal';
}

function nuevocancel(){
	$("#compra").css("color","black");
	$("#nacimiento").css("color","black");
	$("#form_animal").trigger("reset");
}

function evolucion(id){
	$("#fot_animal").val(id);
	$.ajax({
		type:"POST",
		data:"fot_animal="+id,
		url:URL+'animal/getgaleria',
		success: function(data){
			$("#galery").empty();
            $("#galery").append(data);
		}
	});
	$("#Evolucion").modal({ show:true, backdrop:'static'});
}

function guardarfoto(campo){
	if(campo.fot_descripcion.value==""){
		$('#fot_descripcion').focus(); return 0;
	}
	if(campo.imagen.value==""){
		alert("Seleccione Imagen");return 0;
	}
	$.ajax({
		type:"POST",
		async:false,
		mimeType:"multipart/form-data",
		processData:false,
		cache:false,
		contentType:false,
		data:new FormData($("#form_foto")[0]),
		url:URL+'animal/guardarfoto',
		success: function(data){
			if (data=="ErrorI") {
				$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
				$("#textomensaje").html("No Se Registró Correctamente ...");
				$('#Alert').modal({ show:true, backdrop:'static'});
			}else{
				$("#form_foto").trigger("reset");
				$("#galery").empty();
            	$("#galery").append(data);
			}
		}
	});
}