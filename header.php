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
        header('location: ..\index.php');
    }
};
if(!isset($_SESSION['ip'])){
    if (($arquivo = fopen("config.csv", "r")) !== false) {
        $config = [];
        $linha = fgetcsv($arquivo, 50, ',');
        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
            $config[] = [
                'ip' => $linha[0]
            ];
        };
        foreach ($config as $c) {
    
            $_SESSION['ip'] = $c['ip'];
        };
    } else {
        die("arquivo de configuracao não existe");
    };
    
};


//<!-- SESSAO -->
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>CLIENTE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <!-- MENU LATERAL -->
    <div class="container-fluid">
        <div class="sidemenu">
            <div id="menu">
                <a href='../index.php' class='btn'><img src="https://img.icons8.com/office/40/000000/shutdown.png"></a>
                <h3 class="link-titulo">Menu</h3>
                <?php

                //modulos
                if (($arquivo = fopen("modulos.csv", "r")) !== false) {
                    $modulos = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $modulos[] = [
                            'id_modulo' => $linha[0],
                            'descricao_modulos' => $linha['1']
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };
                //acessos
                if (($arquivo = fopen("acessos.csv", "r")) !== false) {
                    $acessos = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $acessos[] = [
                            'id_acesso' => $linha['0'],
                            'id_modulo' => $linha['1'],
                            'descricao_acesso' => $linha['2'],
                            'link' => $linha['3'],
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };
                //permissoes
                if (($arquivo = fopen("permissoes.csv", "r")) !== false) {
                    $permissoes = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $permissoes[] = [
                            'nickname' => $linha['0'],
                            'id_acesso' => $linha['1'],
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };

                $anterior_modulo = 0;
                foreach ($modulos as $modulo) {
                    if ($anterior_modulo !== $modulo['descricao_modulos']) {
                        echo "<div><h3 class='link-titulo'>{$modulo['descricao_modulos']}</h3><ul>";
                        foreach ($acessos as $acesso) {
                            if ($modulo['id_modulo'] == $acesso['id_modulo']) {
                                foreach ($permissoes as $permissao) {
                                    if ($_SESSION['nickname'] === $permissao['nickname'] && $permissao['id_acesso'] === $acesso['id_acesso']) {
                                        echo "<a href='http://{$_SESSION['ip']}/{$acesso['link']}' class='btn btn-primary btn-block'>{$acesso['descricao_acesso']}</a>";
                                    };
                                };
                            } else { };
                        };
                        echo "</div>";
                    } else { };
                    $anterior_modulo = $modulo['descricao_modulos'];
                };
                ?>
            </div>
        </div>
    </div>
    <!-- MENU LATERAL -->
</body>

</html>