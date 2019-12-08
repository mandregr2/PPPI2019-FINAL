<?php
$arquivo = fopen("componentes.csv","a");
fwrite($arquivo, "{$_POST['status']},{$_POST['nomeComponente']},{$_POST['codigoComponente']},{$_POST['creditos']},{$_POST['periodo']},{$_POST['curso']}" . PHP_EOL, 500);
fclose($arquivo);
header("location:cadastroComponentes.php");
?>