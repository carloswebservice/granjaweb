$(function(){
	$("#modanimales").addClass("active open");
	$("#reqreproductor").addClass("active");
})

function guardar(campo){

	if(campo.rep_rp.value==""){
		$('input[name=rep_rp]').focus(); return 0;
	}
	if(campo.rep_nacionalidad.value==""){
		$('input[name=rep_nacionalidad]').focus(); return 0;
	}
	if(campo.rep_raza.value==""){
		$('input[name=rep_raza]').focus(); return 0;
	}
	if(campo.rep_color.value==""){
		$('input[name=rep_color]').focus(); return 0;
	}
	var inputFileImage = $("input[name=rep_foto]")[0];
	var file = inputFileImage.files[0];
	datos = $('#form_reproductor').serialize();
	if(file) {
		datos += "&rep_foto="+file.name;
	}

	$.ajax({
		type:"POST",
		data:datos,
		url:URL+'reproductor/guardar',
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

			if(file) {
				var data = new FormData();
				data.append("foto",file);
				var url = URL+"reproductor/cargar_imagen";

				$.ajax({
					url:url,
					type:"POST",
					contentType:false,
					data:data,
					processData:false,
					cache:false,
					success: function(data) {
						/*alert(data);*/
					}

				});
			}


			$('#Alert').modal({ show:true, backdrop:'static'});
		}
	});
}

function modificar(id){
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:URL+'reproductor/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['rep_id']);
			$("input[name=rep_rp]").val(datos[0]['rep_rp']);
			$("input[name=rep_nacionalidad]").val(datos[0]['rep_nacionalidad']);
			$("input[name=rep_raza]").val(datos[0]['rep_raza']);
			$("input[name=rep_color]").val(datos[0]['rep_color']);
			$("input[name=foto_anterior]").val(datos[0]['rep_foto']);

		}
	});
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'reproductor/eliminar',
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
	location.href=URL+'reproductor';
}

function nuevocancel(){
	$("#form_reproductor").trigger("reset");
}
