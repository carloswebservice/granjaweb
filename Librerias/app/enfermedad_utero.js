$(function(){
	$("#modanimales").addClass("active open");
	$("#reqenfutero").addClass("active");
})

function guardar(campo){

	if(campo.efu_descripcion.value==""){
		$('input[name=efu_descripcion]').focus(); return 0;
	}
	if(campo.efu_abreviatura.value==""){
		$('input[name=efu_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_enfermedad_utero').serialize(),
		url:URL+'enfermedad_utero/guardar',
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
		url:URL+'enfermedad_utero/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['efu_id']);
			$("input[name=efu_descripcion]").val(datos[0]['efu_descripcion']);
			$("input[name=efu_abreviatura]").val(datos[0]['efu_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'enfermedad_utero/eliminar',
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
	location.href=URL+'enfermedad_utero';
}

function nuevocancel(){
	$("#form_enfermedad_utero").trigger("reset");

}

