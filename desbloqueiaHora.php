<pre>
<?php

if (!isset($_SESSION)) { //Verificar se a sess�o n�o j� est� aberta.
    session_start();
};

$_SESSION['idBloqueio'] = $_POST['id'];
$id = $_POST['id'];
$idHora = $_POST['idHora'];

if (($arquivo = fopen("bloqueios.csv", "r")) !== false) {
    $bloqueios = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {

        $bloqueios[] = [
            'id' => $linha[0],
            'idHora' => $linha[1],
        ];
    };
} else {
    header("location:cadastraBloqueios.php");
};


$rebloqueiros = [];

foreach ($bloqueios as $bloqueio) {
    if ($bloqueio['id'] === $id && $bloqueio['idHora'] !== $idHora) {
       
        $rebloqueiros[] = [
            'id' => $bloqueio['id'],
            'idHora' => $bloqueio['idHora']
        ];
    
    
    } else { 
      
    };
}
;


if (($arquivo = fopen("bloqueios.csv", "w")) !== false) {

    $top = ['id', 'idHora'];
    fputcsv($arquivo, $top);

    foreach ($rebloqueiros
        as $rebloqueio) {

        fputcsv($arquivo, $rebloqueio);
    };
} else {

    header('location: \cadastraBloqueios.php');
    die;
};

fclose($arquivo);
header("location:cadastraBloqueios.php");
