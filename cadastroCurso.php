<?php include_once 'header.php'; ?>


<div class='container'>
    <Legend>
        <h1>Cadastro de Cursos:</h1>
    </Legend>
    <form action="salvarCurso.php" method="POST" id="formComponente" data-togle="validator">

        <Legend>Status:</Legend>

        <div class="form-check">
            <input class="form-check-input" type="radio" id="ativo" name="status" value="ativo" checked>
            <label class="form-check-label" for="ativo">
                Ativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="inativo" value="inativo">
            <label class="form-check-label" for="inativo">
                Inativo
            </label>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="nomeCurso">Nome do Curso</label>
                <input type="text" <?php if (isset($nome)) {
                                        print "value='{$nome}'";
                                    }; ?> class="form-control" id="nomeComponente" name="nomeComponente" placeholder="Nome do Componente" data-error="Por favor, informe o nome do componente" required>
            </div>
            <div class="form-group col-md-2">
                <label for="codigoComponente">Codigo</label>
                <input type="code" <?php if (isset($codigo)) {
                                        print "value='{$codigo}'";
                                    }; ?> class="form-control" id="codigoComponente" name="codigoComponente" data-error="Por favor, informe o código do componente." placeholder="Codigo" required>
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



<?php include_once 'footer.php'; ?>