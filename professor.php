<?php include_once "header.php"

?>
<div class="container">
    <table class='table table-striped table-hover'>
        <thead align="center" class='thead-dark'>
            <tr scope='row'>
                <th scope='col' colspan="5"> PROFESSORES</th>
            </tr>
            <tr>
                <th colspan="2">Ações</th>
                <th>codigo</th>
                <th>Nome</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
                }
            } else {
                die("arquivo de configuracao não existe");
            };

            foreach ($professores as $professor) {
                echo "<tr><td width='1em'>
                <form action=editaProfessor.php method='post'>
                <input type='hidden' name='id' value='{$professor['id']}'>
                <input type='hidden' name='nome' value='{$professor['nome']}'>
                <input type='hidden' name='status' value='{$professor['status']}'>
                <input type='hidden' name='cpf' value='{$professor['cpf']}'>
                
                <button type='submit' class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                </form>
                </td>";


                echo "<td width='1em'>
                <form action=cadastraBloqueios.php method='post'>
                <input type='hidden' name='id' value='{$professor['id']}'>
                <input type='hidden' name='nome' value='{$professor['nome']}'>
                <input type='hidden' name='status' value='{$professor['status']}'>
                <input type='hidden' name='cpf' value='{$professor['cpf']}'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-clock-o' aria-hidden='true'></i></button>
                </form>
                </td>";

                echo "<td align='right' width='1em'>{$professor['id']}</td>";
                echo "<td align='left'>{$professor['nome']}</td>";
                if ($professor['status'] == 1) {
                    $class = "btn btn-block btn-primary";
                    $status = "Ativo";
                } else {
                    $class = 'btn btn-block btn-warning';
                    $status = "Inativo";
                }
                echo "<td align='center'width='1em'><button class='{$class}'>{$status}</button></td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="form-row">
        <div class="form-group col-md-8">

            <form action="cadastroprofessor.php" method="POST">
                <button type="submit" class="btn btn-primary">Novo</button>
                <a class="btn btn-danger" href="inicial.php">Voltar</a>

            </form>
        </div>
    </div>
</div>

<?php include_once "footer.php"
?>