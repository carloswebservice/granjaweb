$(function(){
	$("#modcalendario").addClass("active open");
	$("#reqcontroles").addClass("active");
	$("#fechacontrol" ).datepicker({
        format: "dd-mm-yyyy",
    });
    setInterval(ActualizaSuma, 2000);
});

function ActualizaSuma(){
	var sumacontrol1 = 0; sumacontrol2=0;
	$('input[name^="con_control1"]').each(function() {
        sumacontrol1 = sumacontrol1 +  parseFloat($(this).val());
    });
    $('input[name^="con_control2"]').each(function() {
        sumacontrol2 = sumacontrol2 + parseFloat($(this).val());
    });
    $("#control1").text(sumacontrol1);
    $("#control2").text(sumacontrol2);
}

$("#fechacontrol").change(function(){
	$.ajax({
		type:"POST",
		data:"con_fecha="+$(this).val(),
		url:URL+'controles/informacion',
		success: function(data){
			$("#informacion").empty();
			$("#informacion").append(data);
		}
	});
})

function guardar(){
	if ($("#fechacontrol").val()=="") {
		$("#fechacontrol").focus();
	}else{
		$.ajax({
			type:"POST",
			data:$('#form_controles').serialize(),
			url:URL+'controles/guardar',
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
}

function actualizar() {
	location.href=URL+'controles';
}