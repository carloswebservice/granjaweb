$(function(){
	$("#modanimales").addClass("active open");
	$("#reqresulanalisis").addClass("active");
})

function guardar(campo){

	if(campo.res_descripcion.value==""){
		$('input[name=res_descripcion]').focus(); return 0;
	}
	if(campo.res_abreviatura.value==""){
		$('input[name=res_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_resultado_analisis').serialize(),
		url:URL+'resultado_analisis/guardar',
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

function modifires(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'resultado_analisis/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['res_id']);
			$("input[name=res_descripcion]").val(datos[0]['res_descripcion']);
			$("input[name=res_abreviatura]").val(datos[0]['res_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'resultado_analisis/eliminar',
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
	location.href=URL+'resultado_analisis';
}

function nuevocancel(){
	$("#form_resultado_analisis").trigger("reset");

}

