$(document).ready(function(){
	$("#pront #img").click(function(){
		fechaPront();
	});
	$("#formlogin").submit(function(){
		validarLogin();
		return false;
	});
	$("#botaoLogin").click(function(){
		alert("teste");
		validarLogin();
		return false;
	});
});