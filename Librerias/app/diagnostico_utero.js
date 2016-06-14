$(function(){
	$("#modanimales").addClass("active open");
	$("#reqdiagutero").addClass("active");
})

function guardar(campo){

	if(campo.dgu_descripcion.value==""){
		$('input[name=dgu_descripcion]').focus(); return 0;
	}
	if(campo.dgu_abreviatura.value==""){
		$('input[name=dgu_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_diagnostico_utero').serialize(),
		url:URL+'diagnostico_utero/guardar',
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
		url:URL+'diagnostico_utero/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['dgu_id']);
			$("input[name=dgu_descripcion]").val(datos[0]['dgu_descripcion']);
			$("input[name=dgu_abreviatura]").val(datos[0]['dgu_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'diagnostico_utero/eliminar',
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
	location.href=URL+'diagnostico_utero';
}

function nuevocancel(){
	$("#form_diagnostico_utero").trigger("reset");

}

