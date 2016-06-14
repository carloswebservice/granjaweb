$(function(){
	$("#modanimales").addClass("active open");
	$("#reqcausarec").addClass("active");
})

function guardar(campo){

	if(campo.car_descripcion.value==""){
		$('input[name=car_descripcion]').focus(); return 0;
	}
	if(campo.car_abreviatura.value==""){
		$('input[name=car_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_causa_rechazo').serialize(),
		url:URL+'causa_rechazo/guardar',
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
		url:URL+'causa_rechazo/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['car_id']);
			$("input[name=car_descripcion]").val(datos[0]['car_descripcion']);
			$("input[name=car_abreviatura]").val(datos[0]['car_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'causa_rechazo/eliminar',
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
	location.href=URL+'causa_rechazo';
}

function nuevocancel(){
	$("#form_causa_rechazo").trigger("reset");

}

