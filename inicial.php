<?php include_once "header.php"; ?>
<div class='container'>
    <h1>
        Noticias:
    </h1>
    <?php
    if (($arquivo = fopen("noticias.csv", "r")) !== false) {
        $noticias = [];
        $linha = fgetcsv($arquivo, 500, ',');
        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
            $noticias[] = [
                'noticia' => $linha[0],
            ];
        };
    } else {
        die("arquivo de configuracao não existe");
    };
    foreach ($noticias as $noticia) {
        echo "<div class='col-4' >";
        echo "<i class='fa fa-newspaper-o fa-3x'></i><p>{$noticia['noticia']}</p>";
        echo "</div>";
    };
    ?>

</div>
<?php include_once "footer.php"; ?>