$(function(){
	$("#modseguridad").addClass("active open");
	$("#reqpersonal").addClass("active");
})

function guardar(campo){

	if(campo.per_nombre.value==""){
		$('input[name=per_nombre]').focus(); return 0;
	}
	if(campo.per_apepa.value==""){
		$('input[name=per_apepa]').focus(); return 0;
	}
	if(campo.per_apema.value==""){
		$('input[name=per_apema]').focus(); return 0;
	}
	if(campo.per_direccion.value==""){
		$('input[name=per_direccion]').focus(); return 0;
	}
	if(campo.per_dni.value==""){
		$('input[name=per_dni]').focus(); return 0;
	}
	if(campo.per_telefono.value==""){
		$('input[name=per_telefono]').focus(); return 0;
	}
	if(campo.per_distrito.value==""){
		$('select[name=per_distrito]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_personal').serialize(),
		url:URL+'personal/guardar',
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
		url:URL+'personal/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['per_id']);
			$("input[name=per_nombre]").val(datos[0]['per_nombre']);
			$("input[name=per_apepa]").val(datos[0]['per_apepa']);
			$("input[name=per_apema]").val(datos[0]['per_apema']);
			$("input[name=per_direccion]").val(datos[0]['per_direccion']);
			$("input[name=per_dni]").val(datos[0]['per_dni']);
			$("input[name=per_telefono]").val(datos[0]['per_telefono']);

		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'personal/eliminar',
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
	location.href=URL+'personal';
}

function nuevocancel(){
	$("#form_personal").trigger("reset");

}

$(document).on("change","#depa",function(){
	iddepa = $(this).val();
	if(iddepa != "") {
		$.post(URL+"personal/traer_provincias",{iddepa:iddepa},function(data){
			$(".provincia").empty();
			$(".provincia").html(data);
		});
	}
});


$(document).on("change","#prov",function(){
	idprov = $(this).val();
	if(idprov != "") {
		$.post(URL+"personal/traer_distritos",{idprov:idprov},function(data){
			$(".distrito").empty();
			$(".distrito").html(data);
		});
	}
});