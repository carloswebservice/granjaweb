$(function(){
    $("#modcalendario").addClass("active open");
    $("#reqcalendario").addClass("active");
    $("#servicio").hide(); $("#aborto").hide(); $("#muerte").hide(); $("#venta").hide();
    $("#celo").hide(); $("#parto").hide(); $("#secado").hide();$("#rechazo"); $("#medicacion").hide();
    $("#indicaciones").hide();$("#enfermedad").hide(); $("#analisis").hide(); $("#tactorectal").hide();
})

var primerdia=""; ultimodia=""; dia=""; pocision=0;
$(".diaevento").click(function(){
    dia=$(this).text();
})

$('#calendario tr td').click(function(){
    $("#evento > option[value='evento']").attr('selected', 'selected');
    var mes = $('#calendario tr td').index(this)-1;
    var year = $("#añocalendar").text();
    while(mes>12){ 
        mes=mes-12-2;
        pocision=pocision+12+2;
    }
    if(mes<10){ 
        mes="0"+mes;
    }
    if (dia!="") {
        $("#fechaevento").val(dia+'-'+mes+'-'+year); 
        dia="";
    }
    var animal_id=$("tr td")[pocision].innerHTML.split(" / ");
    $("#ani_id").val(animal_id[0]); pocision=0;

    primerdia='01/'+mes+'/'+year;
    ultimodia=DiasMes(mes, year)+'/'+mes+'/'+year;
    $("#fechaevento" ).datepicker({ 
        format: "dd-mm-yyyy",
        startDate: primerdia,
        endDate: ultimodia
    }); 
});

function DiasMes(month, year) {
    return new Date(year || new Date().getFullYear(), month, 0).getDate();
}

function prevaño(){
    $.ajax({
        type:"POST",
        url:URL+'login/restarcalendar',
        success: function(data){
            location.href=window.location;
        }
    });
}

function nextaño(){
    $.ajax({
        type:"POST",
        url:URL+'login/sumarcalendar',
        success: function(data){
            location.href=window.location;
        }
    });
}

$("#evento").on("change", function(){
    if($(this).val()==1){
        $("#parto").show();
    }else{
        $("#parto").hide();
    }

    if($(this).val()==2){
        $("#aborto").show();
    }else{
        $("#aborto").hide();
    }

    if($(this).val()==3){
        $("#celo").show();
    }else{
        $("#celo").hide();
    }  

    if($(this).val()==4){
        $("#servicio").show();
    }else{
        $("#servicio").hide();
    } 

    if($(this).val()==5){
        $("#muerte").show();
    }else{
        $("#muerte").hide();
    }

    if($(this).val()==6){
        $("#venta").show();
    }else{
        $("#venta").hide();
    }
    if($(this).val()==7){
        $("#secado").show();
    }else{
        $("#secado").hide();
    }
    if($(this).val()==8){
        $("#rechazo").show();
    }else{
        $("#rechazo").hide();
    }
    if($(this).val()==9){
        $("#medicacion").show();
    }else{
        $("#medicacion").hide();
    }
    if($(this).val()==10) {
        $("#indicaciones").show();
    }else{
        $("#indicaciones").hide();
    }
    if($(this).val()==11) {
        $("#enfermedad").show();
    }else{
        $("#enfermedad").hide();
    }
    if($(this).val()==12) {
        $("#analisis").show();
    }else{
        $("#analisis").hide();
    }
    if($(this).val()==13) {
        $("#tactorectal").show();
    }else{
        $("#tactorectal").hide();
    }
});

function nuevocancel(){
    //$("#page-sidebar").css("right","-500px");
    $("#fechaevento").datepicker("remove");
    $("#evento").removeAttr("disabled");
    $("#evento").removeAttr("selected");   
    $("#form_evento").trigger("reset");
    $("#servicio").hide(); $("#aborto").hide(); $("#muerte").hide(); $("#venta").hide();
    $("#celo").hide(); $("#parto").hide(); $("#secado").hide(); $("#rechazo").hide(); 
    $("#medicacion").hide(); $("#indicaciones").hide(); $("#enfermedad").hide();
    $("#analisis").hide(); $("#tactorectal").hide();
}

function guardar(campo){
    if(campo.evento.value=="evento"){
        $('#evento').focus(); return 0;
    }
    if(campo.evento.value==1){
        if(campo.par_tipo_parto.value=="par_tipo_parto"){
            $('#par_tipo_parto').focus();return 0;
        }
        if(campo.par_estado_cria.value=="par_estado_cria"){
            $('#par_estado_cria').focus();return 0;
        }
        if(campo.par_sexo_cria.value=="par_sexo_cria"){
            $('#par_sexo_cria').focus();return 0;
        }
        if(campo.par_servicio.value=="par_servicio"){
            $('#par_servicio').focus();return 0;
        }
    }
    if(campo.evento.value==2){
        if(campo.abo_causaaborto.value=="abo_causaaborto"){
            $('#abo_causaaborto').focus();return 0;
        }
    }
    if(campo.evento.value==3){
        if(campo.cel_via_aplicacion.value=="cel_via_aplicacion"){
            $('#cel_via_aplicacion').focus();return 0;
        }
        if(campo.cel_causa_no_inseminal.value=="cel_causa_no_inseminal"){
            $('#cel_causa_no_inseminal').focus();return 0;
        }
        if(campo.cel_medicina_genital.value=="cel_medicina_genital"){
            $('#cel_medicina_genital').focus();return 0;
        }
    }
    if(campo.evento.value==4){
        if(campo.ser_tipo_servicio.value=="ser_tipo_servicio"){
            $('#ser_tipo_servicio').focus();return 0;
        }
        if(campo.ser_reproductor.value=="ser_reproductor"){
            $('#ser_reproductor').focus();return 0;
        }
    }
    if(campo.evento.value==5){
        if(campo.mue_espec_muerte.value=="mue_espec_muerte"){
            $('#mue_espec_muerte').focus();return 0;
        }
    }
    if(campo.evento.value==6){
        if(campo.ven_especificacion_venta.value=="ven_especificacion_venta"){
            $('#ven_especificacion_venta').focus();return 0;
        }
    }
    if(campo.evento.value==7){
        if(campo.sec_med_cuartos_mamarios.value=="sec_med_cuartos_mamarios"){
            $('#sec_med_cuartos_mamarios').focus();return 0;
        }
    }
    if(campo.evento.value==8){
        if(campo.rec_causa_rechazo.value=="rec_causa_rechazo"){
            $('#rec_causa_rechazo').focus();return 0;
        }
    }
    if(campo.evento.value==9){
        if(campo.mec_via_aplicacion.value=="mec_via_aplicacion"){
            $('#mec_via_aplicacion').focus();return 0;
        }
        if(campo.mec_medicamentos.value=="mec_medicamentos"){
            $('#mec_medicamentos').focus();return 0;
        }
    }
    if(campo.evento.value==10){
        if(campo.iee_indicaciones_especiales.value=="iee_indicaciones_especiales"){
            $('#iee_indicaciones_especiales').focus();return 0;
        }
    }
    if(campo.evento.value==11){
        if(campo.enf_tipo_enfermedad.value=="enf_tipo_enfermedad"){
            $('#enf_tipo_enfermedad').focus();return 0;
        }
        if(campo.enf_via_aplicacion.value=="enf_via_aplicacion"){
            $('#enf_via_aplicacion').focus();return 0;
        }
        if(campo.enf_medicamentos.value=="enf_medicamentos"){
            $('#enf_medicamentos').focus();return 0;
        }
    }
    if(campo.evento.value==12){
        if(campo.ana_tipo_analisis.value=="ana_tipo_analisis"){
            $('#ana_tipo_analisis').focus();return 0;
        }
        if(campo.ana_resultado_analisis.value=="ana_resultado_analisis"){
            $('#ana_resultado_analisis').focus();return 0;
        }
    }
    if(campo.evento.value==13){
        if(campo.tar_diagnostico_utero.value=="tar_diagnostico_utero"){
            $('#tar_diagnostico_utero').focus();return 0;
        }
        if(campo.tar_enfermedad_utero.value=="tar_enfermedad_utero"){
            $('#tar_enfermedad_utero').focus();return 0;
        }
        if(campo.tar_enfermedad_ovario.value=="tar_enfermedad_ovario"){
            $('#tar_enfermedad_ovario').focus();return 0;
        }
        if(campo.tar_medicina_genital.value=="tar_medicina_genital"){
            $('#tar_medicina_genital').focus();return 0;
        }
        if(campo.tar_via_aplicacion.value=="tar_via_aplicacion"){
            $('#tar_via_aplicacion').focus();return 0;
        }
    }

    if(campo.fechaevento.value==""){
        $('#fechaevento').focus(); return 0;
    }
    $("#evento").removeAttr("disabled");
    $.ajax({
        type:"POST",
        data:$('#form_evento').serialize(),
        url:URL+'calendario/guardar',
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

function modificar(refevento,evento,animalevento){
    $("#evento").attr("disabled","disabled");
    $.ajax({
        type:"POST",
        data:"refevento_id="+refevento+"& evento="+evento,
        url:URL+'calendario/modificar',
        success: function(data){
            var datos = eval(data);
            $("#id").val(animalevento);
            $("#refevento").val(refevento);
            $("#evento > option[value='"+evento+"']").attr('selected', 'selected');
            //Si el evento es un parto
            if(evento==1){
                $("#parto").show();
                $("#par_tipo_parto > option[value='"+datos[0]['par_tipo_parto']+"']").attr('selected', 'selected');
                $("#par_estado_cria > option[value='"+datos[0]['par_estado_cria']+"']").attr('selected', 'selected');
                $("#par_sexo_cria > option[value='"+datos[0]['par_sexo_cria']+"']").attr('selected', 'selected');
                $("#par_servicio > option[value='"+datos[0]['par_servicio']+"']").attr('selected', 'selected');
            }
            //Si el evento es un aborto
            if(evento==2){
                $("#aborto").show();
                $("#abo_causaaborto > option[value='"+datos[0]['abo_causaaborto']+"']").attr('selected', 'selected');
            }
            //Si el evento es un servicio
            if(evento==3){
                $("#celo").show();
                $("#cel_via_aplicacion > option[value='"+datos[0]['cel_via_aplicacion']+"']").attr('selected', 'selected');
                $("#cel_medicina_genital > option[value='"+datos[0]['cel_medicina_genital']+"']").attr('selected', 'selected');
                $("#cel_causa_no_inseminal > option[value='"+datos[0]['cel_causa_no_inseminal']+"']").attr('selected', 'selected');
            }
            //Si el evento es un servicio
            if(evento==4){
                $("#servicio").show();
                $("#ser_tipo_servicio > option[value='"+datos[0]['ser_tipo_servicio']+"']").attr('selected', 'selected');
                $("#ser_reproductor > option[value='"+datos[0]['ser_reproductor']+"']").attr('selected', 'selected');
            }
            //Si el evento es un muerte
            if(evento==5){
                $("#muerte").show();
                $("#mue_espec_muerte > option[value='"+datos[0]['mue_espec_muerte']+"']").attr('selected', 'selected');
            }
            //Si el evento es un aborto
            if(evento==6){
                $("#venta").show();
                $("#ven_especificacion_venta > option[value='"+datos[0]['ven_especificacion_venta']+"']").attr('selected', 'selected');
            }
            //Si el evento es un secado
            if(evento==7){
                $("#secado").show();
                $("#sec_med_cuartos_mamarios > option[value='"+datos[0]['sec_med_cuartos_mamarios']+"']").attr('selected', 'selected');
            }
            //Si el evento e un rechazo
            if(evento==8){
                $("#rechazo").show();
                $("#rec_causa_rechazo > option[value='"+datos[0]['rec_causa_rechazo']+"']").attr('selected', 'selected');
            }
            //Si el evento es una medicacion
            if(evento==9){
                $("#medicacion").show();
                $("#mec_via_aplicacion > option[value='"+datos[0]['mec_via_aplicacion']+"']").attr('selected', 'selected');
                $("#mec_medicamentos > option[value='"+datos[0]['mec_medicamentos']+"']").attr('selected', 'selected');  
            }
            //si el evento es una indicacion especial
            if(evento==10){
                $("#indicaciones").show();
                $("#iee_indicaciones_especiales > option[value='"+datos[0]['iee_indicaciones_especiales']+"']").attr('selected', 'selected');
            }
            //Si el evento es una enfermedad
            if(evento==11){
                $("#enfermedad").show();
                $("#enf_via_aplicacion > option[value='"+datos[0]['enf_via_aplicacion']+"']").attr('selected', 'selected');
                $("#enf_medicamentos > option[value='"+datos[0]['enf_medicamentos']+"']").attr('selected', 'selected');  
                $("#enf_tipo_enfermedad > option[value='"+datos[0]['enf_tipo_enfermedad']+"']").attr('selected', 'selected');  
            }
            //Si el evento es un analisis
            if(evento==12){
                $("#analisis").show();
                $("#ana_tipo_analisis > option[value='"+datos[0]['ana_tipo_analisis']+"']").attr('selected', 'selected');
                $("#ana_resultado_analisis > option[value='"+datos[0]['ana_resultado_analisis']+"']").attr('selected', 'selected');  
            }
            //Si el evento es un tactorectal
            if(evento==13){
                $("#tactorectal").show();
                $("#tar_diagnostico_utero > option[value='"+datos[0]['tar_diagnostico_utero']+"']").attr('selected', 'selected');
                $("#tar_enfermedad_utero > option[value='"+datos[0]['tar_enfermedad_utero']+"']").attr('selected', 'selected');  
                $("#tar_enfermedad_ovario > option[value='"+datos[0]['tar_enfermedad_ovario']+"']").attr('selected', 'selected');
                $("#tar_medicina_genital > option[value='"+datos[0]['tar_medicina_genital']+"']").attr('selected', 'selected');  
                $("#tar_via_aplicacion > option[value='"+datos[0]['tar_via_aplicacion']+"']").attr('selected', 'selected');
            }
        }
    });
}

function actualizar() {
    location.href=URL+'calendario';
}

function imprimir(calendario){
    $("#page-sidebar").hide();
    $(".navbar-content").hide();
    window.print(calendario);
    $(".navbar-content").show();
}