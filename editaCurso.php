<?php include_once 'header.php';



?>

<div class='container'>
    <Legend>
        <h1>Cadastro de Cursos:</h1>
    </Legend>
    <form action="executaEditaCurso.php" method="POST" id="formComponente" data-togle="validator">

        <Legend>Status:</Legend>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="nomeCurso">Código</label>
                <input type="text" class="form-control" id="nomeComponente" name="id_curso" value="<?= $_POST['id_curso'] ?>" disabled>
                <input type="hidden" class="form-control" id="nomeComponente" name="id_curso" value="<?= $_POST['id_curso'] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="nomeCurso">Nome do Curso</label>
                <input type="text" class="form-control" id="nomeComponente" name="descricao_curso" value="<?= $_POST['descricao_curso'] ?>" data-error="Por favor, informe o nome do componente" required>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-8">

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-danger" href="cursos.php">Voltar</a>
            </div>
        </div>




    </form>

</div>



<?php include_once 'footer.php'; ?>