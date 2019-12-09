<?php include_once 'header.php';


if (!isset($_SESSION['mensagem']) || !empty($_SESSION['mensagemCPF'])) { } else {
    echo  "<div class='alert alert-danger' role='alert'>
  {$_SESSION['mensagemCPF']}</div>";
    $_SESSION['mensagemCPF'] = "";
};

if (!isset($_SESSION['mensagem']) || !empty($_SESSION['mensagemBASE'])) { } else {
    echo  "<div class='alert alert-danger' role='alert'>
  {$_SESSION['mensagemBASE']}</div>";
    $_SESSION['mensagemBASE'] = "";
};

if ($_POST['status'] == 0) {
    $checked0 = 'checked';
    $checked1 = '';
} else {
    $checked0 = '';
    $checked1 = 'checked';
};
?>

<div class='container'>

    <Legend>
        <h1>Cadastro de Professores:</h1>
    </Legend>
    <form action="http://<?= $_SESSION['ip'] ?>/executaeditaProfessor.php" method="POST">

        <Legend>Status:</Legend>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" name="ativo" value="1" <?= $checked1 ?>>
            <label class="form-check-label" for="exampleRadios1">
                Ativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" name="ativo" value="0" <?= $checked0 ?>>
            <label class="form-check-label" for="exampleRadios2">
                Inativo
            </label>
        </div>
        <Legend> Dados Principais</Legend>
        <div class="form-row">
            <div class="form-group col-md-1">
                <label for="inputName">Código</label>
                <input type="text" class="form-control"   value='<?= $_POST['id'] ?>' disabled>
                <input type="hidden" value="<?= $_POST['id']?>" name = 'id'>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputName">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value='<?= $_POST['nome'] ?>'>
                </div>

                <div class="form-group col-md">
                    <label for="inputName">CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="CPF" value='<?= $_POST['cpf'] ?>'>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-danger" href="professor.php">Voltar</a>
            </div>
        </div>
    </form>

</div>

</div>

<?php include_once 'footer.php'; ?>