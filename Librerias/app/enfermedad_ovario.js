$(function(){
	$("#modanimales").addClass("active open");
	$("#reqenfovario").addClass("active");
})

function guardar(campo){

	if(campo.efo_descripcion.value==""){
		$('input[name=efo_descripcion]').focus(); return 0;
	}
	if(campo.efo_abreviatura.value==""){
		$('input[name=efo_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_enfermedad_ovario').serialize(),
		url:URL+'enfermedad_ovario/guardar',
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
		url:URL+'enfermedad_ovario/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['efo_id']);
			$("input[name=efo_descripcion]").val(datos[0]['efo_descripcion']);
			$("input[name=efo_abreviatura]").val(datos[0]['efo_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'enfermedad_ovario/eliminar',
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
	location.href=URL+'enfermedad_ovario';
}

function nuevocancel(){
	$("#form_enfermedad_ovario").trigger("reset");

}

