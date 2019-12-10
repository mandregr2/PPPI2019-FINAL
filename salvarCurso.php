<?php
$arquivo = fopen("cursos.csv","a");
fwrite($arquivo, "{$_POST['id']},{$_POST['nomeCurso']}" . PHP_EOL, 500);
fclose($arquivo);
header("location:cadastroCurso.php");
?>