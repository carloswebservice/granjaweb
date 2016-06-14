function entrar() {
	$.ajax({
		type:"POST",
		data:$('#form_login').serialize(),
		url:URL+'login/control',
		success: function(data){
			if(data==0){
				$("#error").css("display","block");
			}else{
				location.href=URL+'granja';
			}
		}
	});
}