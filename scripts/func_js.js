function abrePront() {
	$("#pront").show();
}
function fechaPront() {
	$("#pront").hide();
}
function escrevePront(texto) {
	abrePront();
	var textoAnterior = $("#pront #quadro").html();
	var linha = "";
	if (textoAnterior==="") {
		linha = "";
	} else {
		linha = "<br>";
	}
	$("#pront #quadro").html(textoAnterior+linha+texto);
}
function validarLogin() {
	escrevePront("teste");
}