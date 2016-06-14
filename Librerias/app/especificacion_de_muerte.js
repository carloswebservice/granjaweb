$(function(){
	$("#modanimales").addClass("active open");
	$("#reqespemuerte").addClass("active");
})

function guardar(campo){

	if(campo.edm_descripcion.value==""){
		$('input[name=edm_descripcion]').focus(); return 0;
	}
	if(campo.edm_abreviatura.value==""){
		$('input[name=edm_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_especificacion_de_muerte').serialize(),
		url:URL+'especificacion_de_muerte/guardar',
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
		url:URL+'especificacion_de_muerte/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['edm_id']);
			$("input[name=edm_descripcion]").val(datos[0]['edm_descripcion']);
			$("input[name=edm_abreviatura]").val(datos[0]['edm_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'especificacion_de_muerte/eliminar',
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
	location.href=URL+'especificacion_de_muerte';
}

function nuevocancel(){
	$("#form_especificacion_de_muerte").trigger("reset");

}

