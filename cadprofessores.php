<?php 
 echo "<form method='POST'><input type='text' name='nomeprofessor' placeholder='Nome do novo professor'>";
 echo "<select name='materia'>
 <option value='matematica'>matematica</option>
 <option value='portugues'>portugues<option>
 <option value='fisica'>fisica</option>
 <option value='filosofia'>filosofia</option>
 <option value='quimica'>quimica</option>
 <option value='biologia'>biologia</option>
</select>
    <input onchange='checaMaisdeUm()' type='checkbox' id='mais2'/>
";
echo "<select id='m2' name='materia' disabled>
<option value='' selected></option>
<option value='matematica'>matematica</option>
<option value='portugues'>portugues<option>
<option value='fisica'>fisica</option>
<option value='filosofia'>filosofia</option>
<option value='quimica'>quimica</option>
<option value='biologia'>biologia</option>
</select>";
echo "<select id='m3' name='materia' disabled>
<option value='' selected></option>
<option value='matematica'>matematica</option>
<option value='portugues'>portugues<option>
<option value='fisica'>fisica</option>
<option value='filosofia'>filosofia</option>
<option value='quimica'>quimica</option>
<option value='biologia'>biologia</option>
</select>
<button type='submit'>Submit</button></form>
<form method='POST'>
<h2>Cadastrar nova materia</h2>
<input onchange='cadastroMateria()' type='checkbox' id='cadmat'/>
<input id='m'  name='materia' disabled type='text' placeholder='Materia'/>
<button disabled id='cs' type='submit'>Submit Materia</button>
";
if (!!$_POST) {
    $arquivo_json = file_get_contents("professores.json");
    $decodifica_json = json_decode($arquivo_json, true,JSON_UNESCAPED_UNICODE);
    if (!!$_POST['nomeprofessor']) {
        $dadosFormulario = array(
            "nome" => $_POST["nomeprofessor"],
            "materia1" => $_POST["materia1"],
            "materia2" => $_POST["materia2"],
            "materia3" => $_POST["materia3"],
        );
        array_push($decodifica_json["professores"],$dadosFormulario);

    }elseif (!!$_POST['materia']) {
        $dadosFormulario=$_POST['materia'];
        array_push($decodifica_json["materias"],$dadosFormulario);
    }
    $arquivo_json_alterado = json_encode($decodifica_json,JSON_UNESCAPED_UNICODE);
    file_put_contents('professores.json', $arquivo_json_alterado);
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}

    echo "<script src='cadprofessores.js'></script>";
?>
