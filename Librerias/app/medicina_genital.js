$(function(){
	$("#modanimales").addClass("active open");
	$("#reqmedgenital").addClass("active");
})

function guardar(campo){

	if(campo.mdg_descripcion.value==""){
		$('input[name=mdg_descripcion]').focus(); return 0;
	}
	if(campo.mdg_abreviatura.value==""){
		$('input[name=mdg_abreviatura]').focus(); return 0;
	}


	$.ajax({
		type:"POST",
		data:$('#form_medicina_genital').serialize(),
		url:URL+'medicina_genital/guardar',
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

function modifimdg(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'medicina_genital/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['mdg_id']);
			$("input[name=mdg_descripcion]").val(datos[0]['mdg_descripcion']);
			$("input[name=mdg_abreviatura]").val(datos[0]['mdg_abreviatura']);


		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'medicina_genital/eliminar',
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
	location.href=URL+'medicina_genital';
}

function nuevocancel(){
	$("#form_medicina_genital").trigger("reset");

}

