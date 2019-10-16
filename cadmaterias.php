<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php 
 include 'navmenu.php';
?>
<form method="POST">
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
		<select name="professor">
		<?php 
		$arquivo_json = file_get_contents("professores.json");
		$decodifica_json = json_decode($arquivo_json, true,JSON_UNESCAPED_UNICODE);
		for ($i=0; $i < count($decodifica_json["professores"]); $i++) { 
			echo "<option value='{$decodifica_json['professores'][$i]['nome']}'>{$decodifica_json['professores'][$i]['nome']}</option>";
		}
		echo "</select>
		<select name='materia'>";
		for ($i=0; $i < count($decodifica_json["professores"]); $i++) { 
			echo "<option value='{$decodifica_json['materias'][$i]}'>{$decodifica_json['materias'][$i]}</option>";
		}
		?>
		</select>
		<input type="text" placeholder="carga horaria" name="ch"/>
		<button type="submit">submit</button></form>
</body>
</html>
<?php
                    if (!!$_POST) {
                        $dadosFormulario = array(
                                "professor" => $_POST["professor"],
                                "materia" => $_POST["materia"],
                                "ch" => $_POST["ch"]
                        );
                        $arquivo_json = file_get_contents("disciplinar.json");
        				$decodifica_json = json_decode($arquivo_json, true,JSON_UNESCAPED_UNICODE);
                        array_push($decodifica_json[$_POST["curso"]]["materias"],$dadosFormulario);
  						
                        // // echo '<pre>';
                        // // var_dump($decodifica_json[0]["economia"]);
                        // // echo '</pre>';
                        $arquivo_json_alterado = json_encode($decodifica_json,JSON_UNESCAPED_UNICODE);
                        file_put_contents('disciplinar.json', $arquivo_json_alterado);
                    }
                    ?>