$(function(){
	$("#modreporte").addClass("active open");
	$("#reqreporteeventos").addClass("active");
})

function prevaño(){
	$.ajax({
		type:"POST",
		url:URL+'login/restaryear',
		success: function(data){
			location.href=window.location;
		}
	});
}

function nextaño(){
	//var nuevoaño= parseInt($("#año").text()) + 1;
	//$("#año").text(nuevoaño);
	$.ajax({
		type:"POST",
		url:URL+'login/sumaryear',
		success: function(data){
			location.href=window.location;
		}
	});
}

function imprimir(calendario){
    $(".navbar-content").hide();
    window.print(calendario);
    $(".navbar-content").show();
}