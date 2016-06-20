$(function(){
	$("#modreporte").addClass("active open");
	$("#reqreporteindicadoresanimales").addClass("active");
})

function imprimir(){
	$(".navbar-content").hide();
	window.print();
	$(".navbar-content").show();
}