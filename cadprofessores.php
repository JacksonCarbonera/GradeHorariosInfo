<?php 
 include 'navmenu.php';
?>
<?php 

 $arquivo_json = file_get_contents("professores.json");
 $decodifica_json = json_decode($arquivo_json, true,JSON_UNESCAPED_UNICODE);
 echo "<form method='POST'><input type='text' name='nomeprofessor' placeholder='Nome do novo professor'>";
 echo "<select name='materia1'>
 <option value=null></option>";

 for ($i=0; $i < count($decodifica_json["materias"]) ; $i++) { 
     echo "<option value='{$decodifica_json['materias'][$i]}'> {$decodifica_json['materias'][$i]}</option>";
 }
 echo "</select>";
 
 echo "<input onchange='checaMaisdeUm()' type='checkbox' id='mais2'/>";
echo "<select id='m2' name='materia2' disabled>
<option value=null></option>";
for ($i=0; $i < count($decodifica_json["materias"]) ; $i++) { 
    echo "<option value='{$decodifica_json['materias'][$i]}'> {$decodifica_json['materias'][$i]}</option>";
}
echo "</select>";
echo "<select id='m3' name='materia3' disabled>
<option value=null></option>";
for ($i=0; $i < count($decodifica_json["materias"]) ; $i++) {  
    echo "<option value='{$decodifica_json['materias'][$i]}'> {$decodifica_json['materias'][$i]}</option>";
}
echo "</select>;
<button type='submit'>Submit</button></form>
<form method='POST' action='cadprofessores.php'>
<h2>Cadastrar nova materia</h2>
<input onchange='cadastroMateria()' type='checkbox' id='cadmat'/>
<input id='m'  name='materia' disabled type='text' placeholder='Materia'/>
<button disabled id='cs' type='submit'>Submit Materia</button>
";
if (!!$_POST) {
    if (!!$_POST['nomeprofessor']) {
       $last= end($decodifica_json["professores"]);
       $codigo = $last["codigo"];
       $codigo++;
        $dadosFormulario = array(
            "codigo" => $codigo,
            "nome" => $_POST["nomeprofessor"],
            "materia1" => $_POST["materia1"],
            "materia2" => $_POST["materia2"],
            "materia3" => $_POST["materia3"],
            "bloqueios" => array(
                "segunda" => array(),
				"terca" => array(),
				"quarta" => array(),
				"quinta" => array(),
				"sexta" => array()
            )
        );
        array_push($decodifica_json["professores"],$dadosFormulario);

    }elseif (!!$_POST['materia']) {
        $dadosFormulario=$_POST['materia'];
        array_push($decodifica_json["materias"],$dadosFormulario);
    }
    $arquivo_json_alterado = json_encode($decodifica_json,JSON_UNESCAPED_UNICODE);
    file_put_contents('professores.json', $arquivo_json_alterado);
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

    echo "<script src='cadprofessores.js'></script>";
?>
