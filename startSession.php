<?php
if (!isset($_SESSION)) { //Verificar se a sessssão não está aberta aberta.
    /* define o limitador de cache para 'private' */
    session_start();
    session_cache_limiter('private');
    $cache_limiter = session_cache_limiter();
 /* define o prazo do cache em 10 minutos */
    session_cache_expire(10);
    $cache_expire = session_cache_expire();
    /* inicia a sess�o */
    $_SESSION['cache_limiter'] = time();
};
?>


    <?php

    if (($arquivo = fopen("usuario.csv", "r")) !== false) {
        $usuarios = [];
        $linha = fgetcsv($arquivo, 50, ',');
        while (($linha = fgetcsv($arquivo, 50, ',')) !== false) {
            $usuarios[] = [
                'nickname' => $linha[0],
                'psword' => $linha[1]
            ];
        };
    };
    for ($i = 0; $i < sizeof($usuarios); $i++) {
        if (!isset($_POST['nickname']) ||  !isset($_POST['passe'])) {
            $_SESSION["mensagem"] = "Login e senha inválidos !!!";
            header('location: \index.php');
        } else {
            if ($_POST['nickname'] === $usuarios[$i]['nickname'] && $_POST['passe'] === $usuarios[$i]['psword']) {
                //Gravando valores dentro da sess�o aberta:
                $_SESSION['nickname'] = $_POST['nickname'];
                header('location: \inicial.php');
                break;
            } else {

                $_SESSION["mensagem"] = "Login e senha invalidos !!";
                header('location: \index.php');
            };
        };
    };
    ?>