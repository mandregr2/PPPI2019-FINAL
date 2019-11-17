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
if (($arquivo = fopen("modulos.csv", "r")) !== false) {
    $modulos = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $modulos[] = [
            'id_modulo' => $linha[0],
            'descricao_modulo' => $linha[1]
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};


if (isset($_POST)) {
    $modulos[] = [
        'id_modulo' => $_POST['modulo'],
        'descricao_modulo' => $_POST['descricao_modulo']
    ];
}

if (($arquivo = fopen("modulos.csv", "w")) !== false) {

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
    $top = [id, descicao_modulo];
    fputcsv($arquivo, $top);

    foreach ($modulos as $modulo) {

        fputcsv($arquivo, $modulo);
    };
};
fclose($arquivo);

header('location: ..\configuracao.php');
?>