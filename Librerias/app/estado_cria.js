
$(function(){
	$("#modanimales").addClass("active open");
	$("#reqestadocria").addClass("active");
})

function guardar(campo){

	if(campo.etc_descripcion.value==""){
		$('input[name=etc_descripcion]').focus(); return 0;
	}
	if(campo.etc_abreviatura.value==""){
		$('input[name=etc_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_estado_cria').serialize(),
		url:URL+'estado_cria/guardar',
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

function modifietc(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'estado_cria/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['etc_id']);
			$("input[name=etc_descripcion]").val(datos[0]['etc_descripcion']);
			$("input[name=etc_abreviatura]").val(datos[0]['etc_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'estado_cria/eliminar',
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
	location.href=URL+'estado_cria';
}

function nuevocancel(){
	$("#form_estado_cria").trigger("reset");

}

