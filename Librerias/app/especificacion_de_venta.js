
$(function(){
	$("#modanimales").addClass("active open");
	$("#reqespedeventa").addClass("active");
})

function guardar(campo){

	if(campo.edv_descripcion.value==""){
		$('input[name=edv_descripcion]').focus(); return 0;
	}
	if(campo.edv_abreviatura.value==""){
		$('input[name=edv_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_especificacion_de_venta').serialize(),
		url:URL+'especificacion_de_venta/guardar',
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

function modifiedv(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'especificacion_de_venta/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['edv_id']);
			$("input[name=edv_descripcion]").val(datos[0]['edv_descripcion']);
			$("input[name=edv_abreviatura]").val(datos[0]['edv_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'especificacion_de_venta/eliminar',
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
	location.href=URL+'especificacion_de_venta';
}

function nuevocancel(){
	$("#form_especificacion_de_venta").trigger("reset");

}

