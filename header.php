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

    <!-- STYLE -->
    <style>
        tr {
            transition:
                1s
        }

        tr:hover {
            background-color:
                greenyellow !important;
            transition:
                .9s
        }

        @charset "UTF-8";

        html,
        body {
            margin:
                0;
            padding:
                0;
        }

        :before,
        :after {
            -webkit-box-sizing:
                border-box;
            -moz-box-sizing:
                border-box;
            box-sizing:
                border-box;
        }

        /*regra para o clear float  */
        .cf:before,
        .cf:after {
            content: "";
            display: table;
        }

        .cf:after {
            clear: both;
        }

        .cf {
            *zoom: 1;
        }

        body {
            margin-left: 5px;
            /*  espa�o  � esquerda   para a barra vertical v�sivel do   menu  */
            font: 62.5%/1.2 Verdana, Helvetica, Arial, sans-serif;
        }

        #lateral {
            padding: 0 100px 0 0;
            -moz-transition: all 0.2s ease;
            -webkit-transition: all 0.8s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            font-size: 1.2em;
            background: rgb(44, 62, 80);
            background-image: -moz-linear-gradient(135deg, rgb(3, 8, 12), rgb(16, 57, 79));
            background-image: -webkit-linear-gradient(135deg, rgb(3, 8, 12), rgb(16, 57, 79));
            background-image: -o-linear-gradient(135deg, rgb(3, 8, 12), rgb(16, 57, 79));
            background-image: -ms-linear-gradient(135deg, rgb(3, 8, 12), rgb(16, 57, 79));
            background-image: linear-gradient(135deg, rgb(3, 8, 12), rgb(16, 57, 79));
            height: 100%;
            overflow: hidden;
            width: 330px;
            position: fixed;
            top: 0;
            left: -320px;
        }

        #lateral:before {
            z-index: 1000;
            font-size: 4em;
            color: white;
            position: fixed;
            left: 4px;
            top: 45px;
        }

        #lateral:hover:before,
        #lateral:focus:before {
            left: -500px
        }

        #lateral:hover,
        #lateral:focus,
        #lateral:active {
            overflow-y: auto;
            -moz-transform: translate(320px, 0);
            -webkit-transform: translate(320px, 0);
            -o-transform: translate(320px, 0);
            transform: translate(320px, 0);
            padding-right: 0;
        }

        #lateral .box {
            list-style-type: none;
            margin-bottom: 1em;
            padding-bottom: 1em;
        }

        #lateral h3 {
            display: inline-block;
            font-weight: bold;
            font-size: 1.6em;
            font-style: normal;
            padding-bottom: 0.2em;
            margin: 2em 0 2em 0.81em;
            color: rgb(255, 255, 255);
            border-bottom: 4px solid rgb(155, 155, 155);
        }

        #menu {
            font-style:
                italic;
            position:
                relative;
            font-size:
                1.0em;
            margin:
                1em 0 1em -1em;
            padding:
                0;
        }

        #menu li {
            padding:
                10;
            margin:
                10;
        }

        #menu li a,
        #menu li a:link {
            font-size:
                1.2em;
            color:
                rgb(255,
                    255,
                    255);
            text-decoration:
                none;
            padding:
                0.8em 0 0.8em 1em;
            display:
                block;
            -moz-transition:
                all 1.2s ease;
            -webkit-transition:
                all 1.2s ease;
            -o-transition:
                all 1.2s ease;
            transition:
                all 1.2s ease;
        }

        #menu li a:hover {
            color:
                rgb(255,
                    255,
                    255);
            background-color:
                rgba(255,
                    255,
                    255,
                    0.2);
            -moz-transition:
                all 0.5s ease;
            -webkit-transition:
                all 0.5s ease;
            -o-transition:
                all 0.5s ease;
            transition:
                all 0.5s ease;
        }

        @media (max-width: 500px) {
            body {
                margin-left:
                    0px;
                background-size:
                    70% 28em !important;
            }

            #lateral {
                padding:
                    0;
                -moz-transition:
                    all 0.5s ease;
                -webkit-transition:
                    all 0.5s ease;
                -o-transition:
                    all 0.5s ease;
                transition:
                    all 0.5s ease;
                font-size:
                    1.2em;
                height:
                    100%;
                overflow:
                    auto;
                width:
                    100%;
                position:
                    static;
                top:
                    0;
                left:
                    0;
            }

            #lateral:before {
                z-index:
                    1000;
                width:
                    0;
                text-align:
                    center;
                content:
                    "";
                font-size:
                    0;
                color:
                    white;
                position:
                    static;
                top:
                    0;
                left:
                    0;
                display:
                    inline-block;
            }

            #lateral:hover,
            #lateral:focus {
                overflow:
                    scroll;
                -moz-transform:
                    none;
                -webkit-transform:
                    none;
                -o-transform:
                    none;
                transform:
                    none;
            }

            #menu li a {
                border-bottom: 1px solid #ccc;
            }

            #menu li:first-child a {
                border-top: 1px solid #ccc;
            }

            .header {
                margin-left: 10%;
            }
        }
    </style>
    <!-- STYLE -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="container-fluid" align="center">
            <img src="logo.png" width="360" height="120" align="middle" />
        </div>
        <div>
            <h5 align="center">Princípios de Programação para Internet 2019</h5>
            <h5 align="center">Professor Thyago Salvá</h5>
            <h5 align="center">email: thyago.salva@bento.ifrs.edu.br</h5>
        </div>
        <div class="container-fluid" align="center">
            <a>TRABALHO FINAL</a></br>
            <a>Desenvolvedores: Estevão Anderle / Guilherme Balbinot / Luis Eduardo Cislaghi / Mario Andre Rodriguez /Natan</a></br>
          
        </div>
    </div>
    <!-- MENU LATERAL -->
    <div class="container-fluid" align="center">
        <div id="lateral">
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
                        echo "<div><h3 class='link-titulo'>{$modulo['descricao_modulos']}</h3><ul align='center'>";
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