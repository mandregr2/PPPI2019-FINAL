<PRE>
<?php
//<!-- SESSAO -->
//Iniciando a sess�o:
if (!isset($_SESSION)) { //Verificar se a sess�o n�o j� est� aberta.
    session_start();
};
if (!isset($_SESSION['nickname'])) {
    $_SESSION['mensagem'] = "por favor realize o login novamente !!";
} else {
    if (time() - $_SESSION['cache_limiter'] > 3600) {
        session_destroy();
        header('location: ../index.php');
    }
};
//<!-- SESSAO -->


if (($arquivo = fopen("acessos.csv", "r")) !== false) {
    $acessos = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $acessos[] = [
            'id_acessso' => $linha[0],
            'id_modulo' => $linha[1],
            'descricao_acesso' =>  $linha[2],
            'link' => $linha[3],
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};


if (isset($_POST)) {
    $acessos[] = [
        'id_acessso' => $_POST['id_acesso'],
        'id_modulo' => $_POST['id_modulo'],
        'descricao_acesso' =>  $_POST['descricao'],
        'link' => $_POST['link']
    ];
}

if (($arquivo = fopen("acessos.csv", "w")) !== false) {

    if ($file['error'] !== 0) {
        switch ($file['error']) {
            case 1:
                $msg = "arquivo maior que o permitido.";
                break;
            case 3:
                $msg = "erro eo enviar arquivo. ";
                break;
            case 4:
                $msg = "nenhum arquivo selecionado. ";
                break;
        }
    } else { };
    $top = [id,id_modulo,descricao,link];
    fputcsv($arquivo, $top);

    foreach ($acessos as $acesso) {

        fputcsv($arquivo, $acesso);
    };
};
fclose($arquivo);



header('location: ..\configuracao.php');
?>