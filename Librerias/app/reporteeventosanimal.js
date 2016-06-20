$(function(){
	$("#modreporte").addClass("active open");
	$("#reqreporteeventosanimal").addClass("active");
})

function imprimir(){
	$(".navbar-content").hide();
	window.print();
	$(".navbar-content").show();
}