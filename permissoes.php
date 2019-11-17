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
$usuario = $_POST['usuario'];
$permitidos = [];
$novos = [];
$permitidos = $_POST['botao'];

//upload o que ja existe de pemrissoes

if (($arquivo = fopen("permissoes.csv", "r")) !== false) {
    $permissoes = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $permissoes[] = [
            'nickname' => $linha[0],
            'id_acesso' => $linha[1]
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};



foreach ($permissoes as $ps) {
    if ($ps['nickname'] != $usuario) {
        $novos [] = [
            'nickname' => $ps['nickname'],
            'id_acesso' => $ps['id_acesso']
        ];
       
    };
};
foreach ($permitidos as $pt) {
   $novos [] = [
        'nickname' => $usuario,
        'id_acesso' => $pt
    ];
};
var_dump($novos);
var_dump($permissoes);
var_dump($permitidos);

//die;


//reescreve o conteudo do csv

function unique_multidim_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

//$permitidos = unique_multidim_array($permissoes, $permissoes);

if (($arquivo = fopen("permissoes.csv", "w")) !== false) {

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
    $top = [nickname, id_acesso];
    fputcsv($arquivo, $top);

    foreach ($novos as $novo) {

        fputcsv($arquivo, $novo);
    };
};
fclose($arquivo);

header('location: \configuracao.php');
?>