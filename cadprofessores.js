function checaMaisdeUm() {
	if (document.getElementById('mais2').checked) {
		document.getElementById('m2').disabled = false;
		document.getElementById('m3').disabled = false;
	} else {
		document.getElementById('m2').disabled = true;
		document.getElementById('m3').disabled = true;
	}
}
function cadastroMateria() {
	if (document.getElementById('cadmat').checked) {
		document.getElementById('m').disabled = false;
		document.getElementById('cs').disabled = false;
	} else {
		document.getElementById('cs').disabled = true;
		document.getElementById('m').disabled = true;
	}
}
