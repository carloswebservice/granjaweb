$(function(){
	$("#modanimales").addClass("active open");
	$("#reqmedcamentos").addClass("active");
})

function guardar(campo){

	if(campo.med_descripcion.value==""){
		$('input[name=med_descripcion]').focus(); return 0;
	}
	if(campo.med_abreviatura.value==""){
		$('input[name=med_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_medicamentos').serialize(),
		url:URL+'medicamentos/guardar',
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

function modifimed(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'medicamentos/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['med_id']);
			$("input[name=med_descripcion]").val(datos[0]['med_descripcion']);
			$("input[name=med_abreviatura]").val(datos[0]['med_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'medicamentos/eliminar',
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
	location.href=URL+'medicamentos';
}

function nuevocancel(){
	$("#form_medicamentos").trigger("reset");

}

