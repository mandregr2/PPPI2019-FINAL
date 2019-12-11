<?php include_once "header.php"

?>
<div class="container">
    <table class='table table-striped table-hover'>
        <thead align="center" class='thead-dark'>
            <tr scope='row'>
                <th scope='col' colspan="5">Componente Curricular</th>
            </tr>
            <tr>
                <th colspan="1">Ações</th>
                <th>codigo</th>
                <th>Nome</th>
                <th>Créditos</th>

                
            </tr>
        </thead>
        <tbody>
            <?php
            if (($arquivo = fopen("componentes.csv", "r")) !== false) {
                $componentes = [];
                $linha = fgetcsv($arquivo, 500, ',');
                while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                    $componentes[] = [
                        'id_componente' => $linha[0],
                        'descricao_componente' => $linha[1],
                        'creditos' => $linha[2]
                     
                        
                    ];
                }
            } else {
                die("arquivo de configuracao não existe");
            };

            foreach ($componentes as $componente) {
               
                echo "<td width='1em'>
                <form action=deletaComponente.php method='post'>
                <input type='hidden' name='id_componente' value='{$componente['id_componente']}'>
                <input type='hidden' name='descricao_componente' value='{$componente['descricao_componente']}'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>
                </td>";

                echo "<td align='right' width='1em'>{$componente['id_componente']}</td>";
                echo "<td align='left'>{$componente['descricao_componente']}</td>";
                echo "<td align='center'>{$componente['creditos']}</td>";
               
            }
            ?>
        </tbody>
    </table>
    <div class="form-row">
        <div class="form-group col-md-8">

            <form action="cadastrocomponente.php" method="POST">
                <button type="submit" class="btn btn-primary">Novo</button>
                <a class="btn btn-danger" href="inicial.php">Voltar</a>

            </form>
        </div>
    </div>
</div>

<?php include_once "footer.php"
?>