$(function(){
	$("#modanimales").addClass("active open");
	$("#reqtiporegsitro").addClass("active");
})

function guardar(campo){

	if(campo.tiporeg_descripcion.value==""){
		$('input[name=tiporeg_descripcion]').focus(); return 0;
	}
	if(campo.tiporeg_abreviatura.value==""){
		$('input[name=tiporeg_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_tipo_registro').serialize(),
		url:URL+'tipo_registro/guardar',
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

function modifitiporeg(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'tipo_registro/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['tiporeg_id']);
			$("input[name=tiporeg_descripcion]").val(datos[0]['tiporeg_descripcion']);
			$("input[name=tiporeg_abreviatura]").val(datos[0]['tiporeg_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'tipo_registro/eliminar',
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
	location.href=URL+'tipo_registro';
}

function nuevocancel(){
	$("#form_tipo_registro").trigger("reset");

}

