$(function(){
	$("#modreporte").addClass("active open");
	$("#reqreportecontroles").addClass("active");
});
var fechaini=""; var fechaf=""; var animalselec=0;
function listarahora(){
	var rango = $("#fecharango").val().split(" - ");
	var fechainicio = rango[0]; var fechafin = rango[1];
	fechaini = fechainicio.split("/"); fechaf= fechafin.split("/");
	fechaini = fechaini[2]+'-'+fechaini[0]+'-'+fechaini[1];
	fechaf = fechaf[2]+'-'+fechaf[0]+'-'+fechaf[1];
	$.ajax({
		type:"POST",
		data:"fechainicio="+fechaini+" &fechafin="+fechaf,
		url:URL+'reportecontroles/listar',
		success: function(data){
			$("#informacion").empty();
			$("#informacion").append(data);
		}
	});
}

function imprimir(){
	$(".navbar-content").hide();
	window.print();
	$(".navbar-content").show();
}

function imprimir1(){
    $(".navbar-content").hide();
    $("#tablareporte").hide();
    window.print();
    $(".navbar-content").show();
    $("#tablareporte").show();
}

function grafico(animal){
    animalselec = animal;
	$.ajax({
        dataType: "json",
		type:"POST",
		data:"animal="+animal+"&fechaini="+fechaini+" &fechaf="+fechaf,
		url:URL+'reportecontroles/grafico',
		success: function(data){
			$('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: data.mensajepricipal
                },
                subtitle: {
                    text: data.mensaje
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Suma De Controles'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">Suma Controles</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> Total<br/>'
                },

                series: [{
                    //name: 'Brands',
                    colorByPoint: true,
                    data: data.grafico
                }]
            });
            $("#info").text(data.informacion);
            $("#grafico").modal("show");
		}
	});
}

function grafico1(){
    $.ajax({
        dataType: "json",
        type:"POST",
        data:"animal="+animalselec+"&fechaini="+fechaini+" &fechaf="+fechaf,
        url:URL+'reportecontroles/grafico1',
        success: function(data){
            $('#container1').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: data.mensajepricipal
                },
                subtitle: {
                    text: data.mensaje
                },
                xAxis: {
                    categories: data.graficofechas
                },
                yAxis: {
                    title: {
                        text: 'Total Suma De Controles'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Grafico Lineal',
                    data: data.graficodatos
                }]
            });
            $("#info1").text(data.informacion);
            $("#grafico1").modal("show");
        }
    });
}