<?php
if (($arquivo = fopen("componentes.csv", "r")) !== false) {
    $componentes = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $componentes[] = [
            'id_componente' => $linha[0],
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

$componentes2 = [];

foreach ($componentes as $componente) {
    if ($componente['id_componente'] !== $_POST['id_componente']) {
       
        $componentes2[] = [
            'id_componente' => $componente['id_componente'],
            'descricao_componente' => $componente['descricao_componente'],
            'creditos' => $componente['creditos'],
            'periodo' => $componente['periodo'],
            'id_curso' => $componente['id_curso'],
            'id_professor' => $componente['id_professor']
        ];
    
    
    };
};

if (($arquivo = fopen("componentes.csv", "w")) == false) {
    $_SESSION['mensagemBASE'] = "ERRO NA BASE DE DADOS !!";
    header('location: \componentes.php');
    die;
} else {

    $top = ['id_componente', 'descricao_componente','creditos','periodo','curso','id_professor'];
    fputcsv($arquivo, $top);

    foreach ($componentes2 as $componente2) {

        fputcsv($arquivo, $componente2);

    };
};



fclose($arquivo);



header('location: \componentes.php');
?>