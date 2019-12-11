<?php include_once 'header.php';
?>

<div class='container'>
    <Legend>
        <h1>Cadastro de Componentes Curriculares:</h1>
    </Legend>
    <form action="salvaComponente.php" method="POST" id="formComponente" data-togle="validator">


        <div class="form-row">
            <div class="form-group col-md">
                <label for="nomeComponente">Nome do Componente</label>
                <input type="text" class="form-control" id="nomeComponente" name="descricao_componente" placeholder="Nome do Componente" data-error="Por favor, informe o nome do componente" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="creditos">Créditos</label>
                <!-- <input type="text" class="form-control" id="creditos" name="creditos" placeholder="Créditos"> -->
                <select class="form-control" name="creditos" id="creditos" required>
                    <option value="">Selecione os créditos</option>
                    <option value="1">1 crédito</option>
                    <option value="2">2 créditos</option>
                    <option value="3">3 créditos</option>
                    <option value="4">4 créditos</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="periodo">Período</label>
                <!-- <input type="text" class="form-control" id="periodo" placeholder="Semestre"> -->
                <select class="form-control" name="periodo" id="periodo" placeholder="Selecione a quantidade de períodos" required>
                    <option value="">Selecione o período</option>
                    <option value="1">1º semestre</option>
                    <option value="2">2º semestre</option>
                    <option value="3">3º semestre</option>
                    <option value="4">4º semestre</option>
                    <option value="5">5º semestre</option>
                    <option value="6">6º semestre</option>
                    <option value="7">7º semestre</option>
                    <option value="8">8º semestre</option>

                </select>
            </div>
            <div class="form-group col-md">
                <label for="curso">Curso</label>
                <select name="curso" id="curso" class="form-control" required>
                    <option value="">Escolher...</option>

                    <?php
                    //cursos
                    if (($arquivo = fopen("cursos.csv", "r")) !== false) {
                        $cursos = [];
                        $linha = fgetcsv($arquivo, 500, ',');
                        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                            $cursos[] = [
                                'id_curso' => $linha[0],
                                'descricao_curso' => $linha[1]
                            ];
                        };
                    } else {
                        die("arquivo de configuracao não existe");
                    }
                    foreach ($cursos as $curso) {
                    
                        print "<option value='{$curso['id_curso']}'>{$curso['descricao_curso']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md">
                <label for="curso">Professor</label>
                <select name="id_professor" id="curso" class="form-control" required>
                    <option value="">Escolher...</option>

                    <?php
                    //cursos
                    if (($arquivo = fopen("professor.csv", "r")) !== false) {
                        $professores = [];
                        $linha = fgetcsv($arquivo, 500, ',');
                        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                            $professores[] = [
                                'id_Professor' => $linha[0],
                                'nome_professor' => $linha[1]
                            ];
                        };
                    } else {
                        die("arquivo de configuracao não existe");
                    }
                    foreach ($professores as $professor) {
                    
                        print "<option value='{$professor['id_professor']}'>{$professor['nome_professor']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- <div style="text-align: center">
                    <legend>Favor confira todos os dados antes de Salvar !!!</legend>
                </div> -->
                <div class="form-row">
            <div class="form-group col-md-8">

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-danger" href="componentes.php">Voltar</a>
            </div>
        </div>
    </form>
</div>
<?php include_once "footer.php"; ?>