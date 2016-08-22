$(function(){
	$("#modcaja").addClass("active open");
	$("#reqreportecaja").addClass("active");
})

function imprimir(){
	$(".navbar-content").hide();
	window.print();
	$(".navbar-content").show();
}

function nuevo(){
	$.ajax({
		type:"POST",
		data:$('#form_caja').serialize(),
		url:URL+'reportecaja/nuevoregistro',
		success: function(data){
			if (data=="SuccessI"){
				actualizar();
			}else{
				$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
				$("#textomensaje").html("El Ultimo Registro Esta Vacio !!");
				$('#Alert').modal({ show:true, backdrop:'static'});
			}
		}
	});
}

function actualizar() {
	location.href=URL+'reportecaja';
}

$('input').keyup(function (e) {
    if (e.keyCode === 13) {
        $.ajax({
			type:"POST",
			data:$('#form_caja').serialize(),
			url:URL+'reportecaja/actualizarcaja',
			success: function(data){
				actualizar();
			}
		});
    }
});

$(".tipo").on("change", function(){
	$.ajax({
		type:"POST",
		data:$('#form_caja').serialize(),
		url:URL+'reportecaja/actualizarcaja',
		success: function(data){
			actualizar();
		}
	});	
});

$(".fecha").on("change",function(){
	$.ajax({
		type:"POST",
		data:$('#form_caja').serialize(),
		url:URL+'reportecaja/actualizarcaja',
		success: function(data){
			actualizar();
		}
	});	
})
