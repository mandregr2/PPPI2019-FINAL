<?php
if (isset($_SESSION)) {
    session_destroy();
};
if (!isset($_SESSION)) { //Verificar se a sess�o n�o j� est� aberta.
    session_cache_expire(10);
    session_start();
};
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
?>
<html>

<head>
    <TITLE>login</TITLE>
    <style>
        .container2 {
            with: 100%;
            height: 100vh;
            background: #6C7A89;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center
        }

        .box {
            justify-content: center;
            align-items: center;
            widht: 500px;
            heigt: 500px;
            background: #fff;
        }

        .box1 {
            justify-content: center;
            align-items: center;
            widht: 200px;
            heigt: 200px;
            background: rgb(239, 228, 176);
        }

        .box2 {
            justify-content: center;
            align-items: center;
            widht: 400px;
            heigt: 200px;
            background: rgb(239, 228, 176);
        }

        body {
            margin: 0px;
        }

        .botaoLogin {
            width: 350px;
            padding: 15px 20px;
            border: 1px solid #eee;
            border-radius: 6px;
            background-color: #FCC302;
            font-size: 18px;
        }

        .botaoLogin2 {
            width: 350px;
            padding: 15px 20px;
            border: 1px solid #eee;
            border-radius: 6px;
            background-color: rgb(255, 99, 71);
            font-size: 18px;
        }

        .campoLogin {
            width: 350px;
            padding: 15px 20px;
            border: 1px solid #eee;
            border-radius: 6px;
            background-color: #FAC800;
            font-size: 18px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

</head>


<body>
    <div class='container2'>
        <?php echo "<form class='container2' name='form' action='http://" . $_SESSION['ip'] . "/StartSession.php' method='POST' name='incluir'>"; ?>

        <div class="box1">

            <div align="center">
                <img src="http://toninhoexpress.com.br/wp-content/uploads/2018/03/login-system.png" align="center" width="200em" height="200em" height="0">
            </div>

            <div class="box2">
                <input class="campoLogin" type="text" name="nickname" placeholder="USUARIO" align-text="center" /></br>
                <input type="password" class="campoLogin" text-align="center" name="passe" placeholder="SENHA" /></br>
            </div>
            <div class="box2">
                <input class="botaoLogin2" type="submit" value="Login"></br>
            </div>
            <?php
            if (!isset($_SESSION['mensagem']) || $_SESSION['mensagem'] === "") { } else {
                echo "<div align='center'>";
                echo "<a class='alert alert-danger'>{$_SESSION['mensagem']}</a>";
                echo "</div>";
                //apagando variaveis da sessao
                session_unset();
                //Destruindo a sess�o:
                session_destroy();
                if (!isset($_SESSION)) {
                    //Verificar se a sess�o n�o j� est� aberta.
                    session_cache_expire(5);
                    session_start();
                };
            };
            ?>




        </div>
        </form>
    </div>
</body>

</html>