$(function(){
	$("#modanimales").addClass("active open");
	$("#reqtiposervicio").addClass("active");
})

function guardar(campo){

	if(campo.tps_descripcion.value==""){
		$('input[name=tps_descripcion]').focus(); return 0;
	}
	if(campo.tps_abreviatura.value==""){
		$('input[name=tps_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_tipo_servicio').serialize(),
		url:URL+'tipo_servicio/guardar',
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

function modifitps(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'tipo_servicio/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['tps_id']);
			$("input[name=tps_descripcion]").val(datos[0]['tps_descripcion']);
			$("input[name=tps_abreviatura]").val(datos[0]['tps_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'tipo_servicio/eliminar',
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
	location.href=URL+'tipo_servicio';
}

function nuevocancel(){
	$("#form_tipo_servicio").trigger("reset");

}

