<?php include_once "header.php"

?>
<div class="container">
    <table class='table table-striped table-hover'>
        <thead align="center" class='thead-dark'>
            <tr scope='row'>
                <th scope='col' colspan="5">CURSOS</th>
            </tr>
            <tr>
                <th colspan="2">Ações</th>
                <th>codigo</th>
                <th>Nome</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if (($arquivo = fopen("cursos.csv", "r")) !== false) {
                $cursos = [];
                $linha = fgetcsv($arquivo, 500, ',');
                while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                    $cursos[] = [
                        'id_curso' => $linha[0],
                        'descricao_curso' => $linha[1]
                     
                        
                    ];
                }
            } else {
                die("arquivo de configuracao não existe");
            };

            foreach ($cursos as $curso) {
                echo "<tr><td width='1em'>
                <form action=editaCurso.php method='post'>
                <input type='hidden' name='id' value='{$curso['id_curso']}'>
                <input type='hidden' name='nome' value='{$curso['descricao_curso']}'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                </form>
                </td>";


                echo "<td width='1em'>
                <form action=excluiCurso.php method='post'>
                <input type='hidden' name='id' value='{$curso['id_curso']}'>
                <input type='hidden' name='nome' value='{$curso['descricao_curso']}'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-clock-o' aria-hidden='true'></i></button>
                </form>
                </td>";

                echo "<td align='right' width='1em'>{$curso['id_curso']}</td>";
                echo "<td align='left'>{$curso['descricao_curso']}</td>";
               
            }
            ?>
        </tbody>
    </table>
    <div class="form-row">
        <div class="form-group col-md-8">

            <form action="cadastroCurso.php" method="POST">
                <button type="submit" class="btn btn-primary">Novo</button>
                <a class="btn btn-danger" href="inicial.php">Voltar</a>

            </form>
        </div>
    </div>
</div>

<?php include_once "footer.php"
?>