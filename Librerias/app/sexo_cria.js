$(function(){
	$("#modanimales").addClass("active open");
	$("#reqsexocria").addClass("active");
})

function guardar(campo){

	if(campo.scr_descripcion.value==""){
		$('input[name=scr_descripcion]').focus(); return 0;
	}
	if(campo.scr_abreviatura.value==""){
		$('input[name=scr_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_sexo_cria').serialize(),
		url:URL+'sexo_cria/guardar',
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

function modifiscr(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'sexo_cria/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['scr_id']);
			$("input[name=scr_descripcion]").val(datos[0]['scr_descripcion']);
			$("input[name=scr_abreviatura]").val(datos[0]['scr_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'sexo_cria/eliminar',
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
	location.href=URL+'sexo_cria';
}

function nuevocancel(){
	$("#form_sexo_cria").trigger("scret");

}

