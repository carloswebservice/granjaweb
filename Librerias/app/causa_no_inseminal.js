$(function(){
	$("#modanimales").addClass("active open");
	$("#reqcausaninse").addClass("active");
})

function guardar(campo){

	if(campo.cni_descripcion.value==""){
		$('input[name=cni_descripcion]').focus(); return 0;
	}
	if(campo.cni_abreviatura.value==""){
		$('input[name=cni_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_causa_no_inseminal').serialize(),
		url:URL+'causa_no_inseminal/guardar',
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
		url:URL+'causa_no_inseminal/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['cni_id']);
			$("input[name=cni_descripcion]").val(datos[0]['cni_descripcion']);
			$("input[name=cni_abreviatura]").val(datos[0]['cni_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'causa_no_inseminal/eliminar',
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
	location.href=URL+'causa_no_inseminal';
}

function nuevocancel(){
	$("#form_causa_no_inseminal").trigger("reset");

}

