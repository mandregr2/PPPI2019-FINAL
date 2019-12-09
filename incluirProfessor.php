<PRE>
<?php

//<!-- SESSAO -->
//Iniciando a sess�o:
if (!isset($_SESSION)) { //Verificar se a sess�o n�o j� est� aberta.
    session_start();
};
$_SESSION['mensagemCPF'] = "";
$_SESSION['mensagemBASE'] = "";
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
};
if (isset($_POST['status'])) {
    $status = $_POST['status'];
} else {
    header('location: \cadastroProfessor.php');
};
if (isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
} else {
    header('location: \cadastroProfessor.php');
};

//upload o que ja existe de pemrissoes

if (($arquivo = fopen("professor.csv", "r")) !== false) {
    $professores = [];
    $linha = fgetcsv($arquivo, 500, ',');
    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
        $professores[] = [
            'id' => $linha[0],
            'nome' => $linha[1],
            'status' => $linha[2],
            'cpf' => $linha[3]
        ];
    };
} else {
    die("arquivo de configuracao não existe");
};
$lastId = sizeof($professores);

//verifica se ja existe mesmo cpf no cadastro
foreach ($professores as $professor) {
    if ($professor['cpf'] == $cpf) {
        $_SESSION['mensagemCPF'] = "CPF ja existe no cadastro !!";
        header('location: \cadastroProfessor.php');
        
    } else {
        # code...
    };
};

$professores[] = [
    'id' => $lastId + 1,
    'nome' => $nome,
    'status' => $status,
    'cpf' => $cpf
];

//die;


//reescreve o conteudo do csv


if (($arquivo = fopen("professor.csv", "w")) == false) {
    $_SESSION['mensagemBASE'] = "ERRO NA BASE DE DADOS !!";
   // header('location: \cadastroProfessor.php');
    die;
} else {

    $top = ['id', 'nome', 'status', 'cpf'];
    fputcsv($arquivo, $top);

    foreach ($professores as $professor) {

        fputcsv($arquivo, $professor);

    };
};



fclose($arquivo);



header('location: \professor.php');
?>