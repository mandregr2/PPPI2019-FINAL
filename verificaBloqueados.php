<?php
if (isset($_GET['p']) && isset($_GET['h'])) {
    // verifica horarios disponiveis
    if (($arquivo = fopen("bloqueios.csv", "r")) !== false) {
        $bloqueados = [];
        $linha = fgetcsv($arquivo, 500, ',');
        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
            $bloqueados[] = [
                'idProfessor' => $linha[0],
                'idHora' => $linha[1],
            ];
        }
    } else {
        echo "falha no arquivo";
    }
    $b = true;
    foreach ($bloqueados as $key => $value) {
        if ($value['idProfessor'] == $_GET['p'] && $value['idHora'] == $_GET['h']) {
            $b = false;        
        }
    } 
    if ($b == true) {
        echo "true";
    } else {
        echo "false";
    }
    // se não foi encontrado no bloqueio, ta liberado.
} else {
    echo "false";
}