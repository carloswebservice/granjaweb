$(function(){
	$("#modreporte").addClass("active open");
	$("#reqreportereproduccion").addClass("active");
})
function imprimir(){
	$("#tablacontenido").removeAttr("style");
	$(".navbar-content").hide();
	window.print();
	$(".navbar-content").show();
	$("#tablacontenido").css("width","1600px");
}
$("#paricion").on("change", function(){
    $.ajax({
        type:"POST",
        data:"anio="+$(this).val(),
        url:URL+'reportereproduccion/pariciones',
        success: function(data){
            $("#actualizarpariciones").empty();
            $("#actualizarpariciones").append(data);
        }
    });
});