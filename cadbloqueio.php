<?php 
include 'navmenu.php'
?>
<form method="POST">
<select name="professor" onchange="mudaProfessor(this.value)">
		<?php 
		$arquivo_json = file_get_contents("professores.json");
        $decodifica_json = json_decode($arquivo_json, true,JSON_UNESCAPED_UNICODE);
        echo "<script>var professoresjson = $arquivo_json;</script>";
        echo "<option value='' disabled selected></option>";
		for ($i=0; $i < count($decodifica_json["professores"]); $i++) { 
			echo "<option value='{$decodifica_json['professores']["c".$i]['codigo']}'>{$decodifica_json['professores']["c".$i]['nome']}</option>";
        }
        ?>
    </select>
    <table>
    <!-- <tr>
        <td><input type="radio" name="segunda1"></td>
        <td><input type="radio" name="terca1"></td>
        <td><input type="radio" name="quarta1"></td>
        <td><input type="radio" name="quinta1"></td>
        <td><input type="radio" name="sexta1"></td>
    </tr> -->
    <?php
    $dias = ["segunda","terca","quarta","quinta","sexta"];
    echo "<tr>
            <td></td>
            <td>Segunda</td>
            <td>Terça</td>
            <td>Quarta</td>
            <td>Quinta</td>
            <td>Sexta</td>
        </tr>";
    for ($i=1; $i < 11 ; $i++) { 
        echo "<tr>";
        echo "<td>Periodo $i</td>";
        for ($in=0; $in < 5 ; $in++) { 
            echo "<td><input id='$dias[$in]$i' type='checkbox' name='$dias[$in]$i'/></td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
    <button type="submit">Submit</button>
</form>
<?php 
if (!!$_POST) {
    $dias = ["segunda","terca","quarta","quinta","sexta"];
    $bloqueios = array(
        "segunda" => array(),
        "terca"=> array(),
        "quarta"=> array(),
        "quinta"=>array(),
        "sexta"=> array()
    );
    // for ($in=0; $in <5 ; $in++) { 
    //     # code...
    // }
    for ($in=0; $in <5 ; $in++) { 
        
    for ($x= 1; $x < 11 ; $x++) {
        if (!empty($_POST[$dias[$in].$x])) {
            array_push($bloqueios[$dias[$in]],$x);
        }
    }
}
    $decodifica_json["professores"]["c".$_POST["professor"]]["bloqueios"]= $bloqueios;
    $arquivo_json_alterado = json_encode($decodifica_json,JSON_UNESCAPED_UNICODE);
    file_put_contents('professores.json', $arquivo_json_alterado);
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
    // echo "<pre>";
    // var_dump($decodifica_json["professores"][$_POST["professor"]]);
    // echo "</pre>";
}
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
?>
<script src="cadbloqueio.js"></script>