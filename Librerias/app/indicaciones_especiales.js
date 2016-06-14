

$(function(){
	$("#modanimales").addClass("active open");
	$("#reqindiespeciales").addClass("active");
})

function guardar(campo){

	if(campo.ide_descripcion.value==""){
		$('input[name=ide_descripcion]').focus(); return 0;
	}
	if(campo.ide_abreviatura.value==""){
		$('input[name=ide_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_indicaciones_especiales').serialize(),
		url:URL+'indicaciones_especiales/guardar',
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

function modifiide(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'indicaciones_especiales/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['ide_id']);
			$("input[name=ide_descripcion]").val(datos[0]['ide_descripcion']);
			$("input[name=ide_abreviatura]").val(datos[0]['ide_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'indicaciones_especiales/eliminar',
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
	location.href=URL+'indicaciones_especiales';
}

function nuevocancel(){
	$("#form_indicaciones_especiales").trigger("reset");

}

