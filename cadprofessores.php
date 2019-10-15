<?php 
 echo "<form method='POST'><input type='text' name='nomeprofessor' placeholder='Nome do novo professor'>";
 echo "<input type='checkbox' name='tecnico'>Professor do ensino tecnico";
 echo "<button type='submit'>Submit</button></form>";
if (!!$_POST) {
        $dadosFormulario = array(
            "Nome" => $_POST["nomeprofessor"],
            "tecnico" => $_POST["tecnico"],
        );
    $arquivo_json = file_get_contents("professores.json");
    $decodifica_json = json_decode($arquivo_json, true,JSON_UNESCAPED_UNICODE);
    array_push($decodifica_json,$dadosFormulario);
    $arquivo_json_alterado = json_encode($decodifica_json,JSON_UNESCAPED_UNICODE);
    file_put_contents('professores.json', $arquivo_json_alterado);
}
                    
?>
