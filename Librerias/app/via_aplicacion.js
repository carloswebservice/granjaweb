$(function(){
	$("#modanimales").addClass("active open");
	$("#reqviaplicacion").addClass("active");
})

function guardar(campo){

	if(campo.vap_descripcion.value==""){
		$('input[name=vap_descripcion]').focus(); return 0;
	}
	if(campo.vap_abreviatura.value==""){
		$('input[name=vap_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_via_aplicacion').serialize(),
		url:URL+'via_aplicacion/guardar',
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
		url:URL+'via_aplicacion/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['vap_id']);
			$("input[name=vap_descripcion]").val(datos[0]['vap_descripcion']);
			$("input[name=vap_abreviatura]").val(datos[0]['vap_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'via_aplicacion/eliminar',
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
	location.href=URL+'via_aplicacion';
}

function nuevocancel(){
	$("#form_via_aplicacion").trigger("reset");

}

