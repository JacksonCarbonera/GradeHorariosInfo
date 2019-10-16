<!DOCTYPE html>
<html lang="pt-br">
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
    <form method="post">
    <select name="curso" id="selectCursos" onchange="cursos()">
    <option value="none"></option>
    
    </select>
    <select name="professor">
    
    </select>
    </form>
    <script>
    function cursos(){
        var select = document.getElementById('professores')
    }
    </script>
</body>
</html>