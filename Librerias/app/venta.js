$(function(){
	$("#modeventos").addClass("active open");
	$("#reqventa").addClass("active");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
})

function guardar(campo){

	if(campo.ven_animal.value==""){
		$('input[name=ven_animal]').focus(); return 0;
	}
	if(campo.ven_especificacion_venta.value==""){
		$('input[name=ven_especificacion_venta]').focus(); return 0;
	}

	$.ajax({
		type:"POST",
		data:$('#form_venta').serialize(),
		url:URL+'venta/guardar',
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
		url:URL+'venta/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['ven_id']);
			$("select[name=ven_animal] > option[value='"+datos[0]['ven_animal']+"']").attr('selected', 'selected');
			$("select[name=ven_especificacion_venta] > option[value='"+datos[0]['ven_especificacion_venta']+"']").attr('selected', 'selected');
			$("#fechaevento").val(datos[0]['ven_fecha']);

		}
	});
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
}

function eliminar(id){

	if (window.confirm("SEGURO QUE QUIERES ELIMINAR ?")) {
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:URL+'venta/eliminar',
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
	location.href=URL+'venta';
}

function nuevocancel(){
	$("#form_venta").trigger("reset");
	$("#fechaevento" ).datepicker({
        format: "dd-mm-yyyy",
    });
	$("select[name=ven_animal] > option[value='']").attr('selected', 'selected');
	$("select[name=ven_especificacion_venta] > option[value='']").attr('selected', 'selected');


}
