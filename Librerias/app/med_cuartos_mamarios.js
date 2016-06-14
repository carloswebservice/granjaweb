$(function(){
	$("#modanimales").addClass("active open");
	$("#reqmedcuartomamarios").addClass("active");
})

function guardar(campo){

	if(campo.mdm_descripcion.value==""){
		$('input[name=mdm_descripcion]').focus(); return 0;
	}
	if(campo.mdm_abreviatura.value==""){
		$('input[name=mdm_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_med_cuartos_mamarios').serialize(),
		url:URL+'med_cuartos_mamarios/guardar',
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

function modifimdm(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'med_cuartos_mamarios/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['mdm_id']);
			$("input[name=mdm_descripcion]").val(datos[0]['mdm_descripcion']);
			$("input[name=mdm_abreviatura]").val(datos[0]['mdm_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'med_cuartos_mamarios/eliminar',
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
	location.href=URL+'med_cuartos_mamarios';
}

function nuevocancel(){
	$("#form_med_cuartos_mamarios").trigger("reset");

}

