<?php

if (!isset($_SESSION)) { //Verificar se a sess�o n�o j� est� aberta.
    session_start();
};
$_SESSION['idBloqueio'] = $_POST['id'];


$arquivo = fopen("bloqueios.csv","a");
fwrite($arquivo, "{$_POST['id']},{$_POST['idHora']}". PHP_EOL, 500);
fclose($arquivo);
header("location:cadastraBloqueios.php");
?> 
