<!DOCTYPE html>
<html>
<head>
	<title>Grade Notas</title>
	<meta charset="UTF-8">
</head>
<body>
<?php 
 include 'navmenu.php';
?>
	<div class="container">
		<p>cadastrar materias</p>
		<form method="POST">

			<!-- <option name="acao">
				<section value="cadNovo">Cadastrar novo Professor</section>
				<section value="cadBloq">Cadastrar novo Bloqueio</section>
			</option>

		<h1>Cadastro Novos professores</h1>
		<input type="text" placeholder="prof" name="nomeProfessor">
		<input type="text" placeholder="mat" name="materia">

		<select name="nome">
			<option disabled selected></option>
			<option value="1">Thyago Salva</option>
			<option value="2">Thiago Gourlart</option>
			<option value="3">Soninho</option>
			<option value="4">Alek</option>
		</select>

		<input type="radio" name="Seg">Segunda-Feira
		<input type="radio" name="Ter">Terça-Feira
		<input type="radio" name="Qua">Quarta-Feira
		<input type="radio" name="Qui">Quinta-Feira
		<input type="radio" name="Sex">Sexta-Feira
		<input type="text" name="professor" placeholder="Nome do professor"> -->
		<select name="curso">
			<option value="INFO1">INFO1</option>
			<option value="INFO2">INFO2</option>
			<option value="INFO3">INFO3</option>
			<option value="AGROA1">AGROA1</option>
			<option value="AGROA2">AGROA2</option>
			<option value="AGROA3">AGROA3</option>
			<option value="AGROB1">AGROB1</option>
			<option value="AGROB2">AGROB2</option>
			<option value="AGROB3">AGROB3</option>
			<option value="ENO1">ENO1</option>
			<option value="ENO2">ENO2</option>
			<option value="ENO3">ENO3</option>
			<option value="MEIO1">MEIO1</option>
			<option value="MEIO2" disabled></option>
			<option value="MEIO3" disabled></option>
		</select>
		<input type="text" placeholder="Professor" name="professor"/>
		<input type="text" placeholder="Materia" name="materia"/>
		<input type="text" placeholder="carga horaria" name="ch"/>
		<button type="submit">submit</button>
		</form>
		<?php 
		
   		?>
	</div>
</body>
			
</html>