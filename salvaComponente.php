<?php
if (($arquivo = fopen("componentes.csv", "r")) !== false) {
    $componentes = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $componentes[] = [
            'id_componete' => $linha[0],
            'descricao_componente' => $linha[1],
            'creditos' => $linha[2],
            'periodo' => $linha[3],
            'id_curso' => $linha[4],
            'id_professor' => $linha[5]
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};
$lastId = sizeof($componentes);

$componentes[] = [
            'id_componente' => $lastId +1 ,
            'descricao_componente' => $_POST['descricao_componente'],
            'creditos' => $_POST['creditos'],
            'periodo' => $_POST['periodo'],
            'id_curso' => $_POST['id_curso'],
            'id_professor' => $_POST['id_professor'],
    ];


if (($arquivo = fopen("componentes.csv", "w")) == false) {
    $_SESSION['mensagemBASE'] = "ERRO NA BASE DE DADOS !!";
    header('location: \componentes.php');
    die;
} else {

    $top = ['id_componente', 'descricao_componente','creditos','periodo','curso','id_professor'];
    fputcsv($arquivo, $top);

    foreach ($componentes as $componente) {

        fputcsv($arquivo, $componente);

    };
};



fclose($arquivo);



header('location: \componentes.php');
?>
