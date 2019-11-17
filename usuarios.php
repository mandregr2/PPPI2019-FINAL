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

if (($arquivo = fopen("usuario.csv", "r")) !== false) {
    $usuarios = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $usuarios[] = [
            'nickname' => $linha[0],
            'psword' => $linha[1]
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};

$usuarios[] = [
    'nickname' => $_POST['nickname'],
    'psword' => $_POST['password']
];


if (($arquivo = fopen("usuario.csv", "w")) !== false) {
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
    $top = [nickname,psword];
    fputcsv($arquivo, $top);

   foreach($usuarios as $usuario){

    fputcsv($arquivo, $usuario);
   
    };
};
fclose($arquivo);

// var_dump($linhas);

//<!-- DELETA DO BANCO -->
echo "REGISTRADO com sucesso!";
header('location: \configuracao.php');
?>