<?php include_once 'header.php'; ?>


<div class='container'>
    <Legend>
        <h1>Cadastro de Cursos:</h1>
    </Legend>
    <form action="salvarCurso.php" method="POST" id="formComponente" data-togle="validator">

        <Legend>Status:</Legend>


        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="nomeCurso">Nome do Curso</label>
                <input type="text" class="form-control" id="nomeComponente" name="descricao_curso" placeholder="Nome do Curso" data-error="Por favor, informe o nome do componente" required>
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