$(function(){
	$("#modreporte").addClass("active open");
	$("#reqreporteanimales").addClass("active");
})
function imprimir(){
	$(".navbar-content").hide();
	window.print();
	$(".navbar-content").show();
}