var dias = [
	'segunda',
	'terca',
	'quarta',
	'quinta',
	'sexta'
];
function mudaProfessor(elemento) {
	for (let i = 0; i < 5; i++) {
		for (let index = 1; index < 11; index++) {
			var option = dias[i] + index;
			document.getElementById(option).checked = false;
		}
	}
	for (let i = 0; i < 5; i++) {
		for (let index = 0; index < 11; index++) {
			if (!!professoresjson['professores']['c' + elemento]['bloqueios'][dias[i]][index]) {
				var option = dias[i] + professoresjson['professores']['c' + elemento]['bloqueios'][dias[i]][index];
				console.log(option);
				document.getElementById(option).checked = true;
			} else {
				break;
			}
		}
	}
}
