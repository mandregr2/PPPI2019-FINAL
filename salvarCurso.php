<?php
if (($arquivo = fopen("cursos.csv", "r")) !== false) {
    $cursos = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $cursos[] = [
            'id_curso' => $linha[0],
            'descricao_curso' => $linha[1]
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};
$lastId = sizeof($cursos);

$cursos[] = [
    'id_curso' => $lastId + 1,
    'descricao_curso' => $_POST['descricao_curso']
    ];


if (($arquivo = fopen("cursos.csv", "w")) == false) {
    $_SESSION['mensagemBASE'] = "ERRO NA BASE DE DADOS !!";
    header('location: \cursos.php');
    die;
} else {

    $top = ['id_curso','descricao_curso'];
    fputcsv($arquivo, $top);

    foreach ($cursos as $curso) {

        fputcsv($arquivo, $curso);

    };
};



fclose($arquivo);



header('location: \cursos.php');
?>