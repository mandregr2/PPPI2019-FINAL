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

$cursos2 = [];

foreach ($cursos as $curso) {
    if ($curso['id_curso'] !== $_POST['id_curso']) {
       
        $cursos2[] = [
            'id_curso' => $curso['id_curso'],
            'descricao_curso' => $curso['descricao_curso']
        ];
    
    
    } else { 
      
    };
};

if (($arquivo = fopen("cursos.csv", "w")) == false) {
    $_SESSION['mensagemBASE'] = "ERRO NA BASE DE DADOS !!";
    header('location: \cursos.php');
    die;
} else {

    $top = ['id_curso','descricao_curso'];
    fputcsv($arquivo, $top);

    foreach ($cursos2 as $curso2) {

        fputcsv($arquivo, $curso2);

    };
};



fclose($arquivo);



header('location: \cursos.php');
?>