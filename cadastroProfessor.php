<?php include_once 'header.php';

?>

<div class='container'>
    <?php
    if (!isset($_SESSION['mensagem']) || !empty($_SESSION['mensagemCPF'])) { } else {
        echo  "<div class='alert alert-danger' role='alert'>
                {$_SESSION['mensagemCPF']}
                </div>";
    };

    if (!isset($_SESSION['mensagem']) || !empty($_SESSION['mensagemBASE'])) { } else {
        echo  "<div class='alert alert-danger' role='alert'>
            {$_SESSION['mensagemBASE']}
            </div>";
           
    };
    ?>
    <Legend>
        <h1>Cadastro de Professores:</h1>
    </Legend>
    <form action="http://<?= $_SESSION['ip'] ?>/incluirProfessor.php" method="POST">

        <Legend>Status:</Legend>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" name="ativo" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Ativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" name="ativo" value="0">
            <label class="form-check-label" for="exampleRadios2">
                Inativo
            </label>
        </div>
        <Legend> Dados Principais</Legend>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputName">Nome Completo</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
            </div>

            <div class="form-group col-md">
                <label for="inputName">CPF</label>
                <input type="text" class="form-control" name="cpf" placeholder="CPF">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-danger" href="professor.php">Voltar</a>
            </div>
        </div>
</div>

</form>
</div>

<?php include_once 'footer.php'; ?>