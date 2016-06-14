$(function(){
	$("#modanimales").addClass("active open");
	$("#reqtipoenfermedad").addClass("active");
})

function guardar(campo){

	if(campo.tpe_descripcion.value==""){
		$('input[name=tpe_descripcion]').focus(); return 0;
	}
	if(campo.tpe_abreviatura.value==""){
		$('input[name=tpe_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_tipo_enfermedad').serialize(),
		url:URL+'tipo_enfermedad/guardar',
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

function modifitpe(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'tipo_enfermedad/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['tpe_id']);
			$("input[name=tpe_descripcion]").val(datos[0]['tpe_descripcion']);
			$("input[name=tpe_abreviatura]").val(datos[0]['tpe_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'tipo_enfermedad/eliminar',
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
	location.href=URL+'tipo_enfermedad';
}

function nuevocancel(){
	$("#form_tipo_enfermedad").trigger("reset");

}

