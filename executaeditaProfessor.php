<PRE>
<?php
//var_dump($_POST);
//die;
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
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    header('location: \cadastroProfessor.php');
    die;
};
if (isset($_POST['status'])) {
    $status = $_POST['status'];
} else {
    header('location: \cadastroProfessor.php');
    die;
};
if (isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
} else {
    header('location: \editaProfessor.php');
    die;
};

//upload o que ja existe 

if (($arquivo = fopen("professor.csv", "r")) !== false) {
    $professores = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        //pega somente o registro a editar e edita
        if ($linha[0] == $_POST['id']) {
            $professores[] = [
                'id' => $_POST['id'],
                'nome' => $_POST['nome'],
                'status' => $_POST['status'],
                'cpf' => $_POST['cpf']
            ];
            //caso nao seja o registro segue em frente
        } else {
            $professores[] = [
                'id' => $linha[0],
                'nome' => $linha[1],
                'status' => $linha[2],
                'cpf' => $linha[3]
            ];
        };
    };
} else {
    die("arquivo de configuracao não existe");
};


//reescreve o conteudo do csv


if (($arquivo = fopen("professor.csv", "w")) == false) {
    $_SESSION['mensagemBASE'] = "ERRO NA BASE DE DADOS !!";
    header('location: \cadastroProfessor.php');
    die;
} else {

    $top = ['id', 'nome', 'status', 'cpf'];
    fputcsv($arquivo, $top);

    foreach ($professores as $professor) {

        fputcsv($arquivo, $professor);
    };
};




fclose($arquivo);

$_SESSION['mensagemCPF'] = "";
$_SESSION['mensagemBASE'] = "";

header('location: \professor.php');
?>