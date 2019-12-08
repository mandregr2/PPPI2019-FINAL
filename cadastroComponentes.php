<?php //include_once 'header.php';

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Cadastro de componente</title>
    </head>
    <body>
        <div class='container'>
            <Legend><h1>Cadastro de Componentes Curriculares:</h1></Legend>
            <form action="salvarComponente.php" method="POST" id="formComponente" data-togle="validator">

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
                        <label for="nomeComponente">Nome do Componente</label>
                        <input type="text" <?php if (isset($nome)) {
                                                print "value='{$nome}'";
                                            }; ?> class="form-control" id="nomeComponente" name="nomeComponente"
                                            placeholder="Nome do Componente" data-error="Por favor, informe o nome do componente" required>
                                        </div>
                    <div class="form-group col-md-2">
                        <label for="codigoComponente">Codigo</label>
                        <input type="code" <?php if (isset($codigo)) {
                                                print "value='{$codigo}'";
                                            }; ?> class="form-control" id="codigoComponente" name="codigoComponente" 
                                            data-error="Por favor, informe o código do componente." placeholder="Codigo" required>
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
                            <option value="1sem">1º semestre</option>
                            <option value="2sem">2º semestre</option>
                        </select>
                        <!-- <select multiple class="form-control" name="periodos[]" id="periodos" placeholder="Selecione a quantidade de créditos">
                            <option value="periodo1">07:30 - 08:20</option>
                            <option value="periodo2">08:20 - 09:10</option>
                            <option value="periodo3">09:10 - 10:00</option>
                            <option value="periodo4">10:10 - 11:00</option>
                            <option value="periodo5">11:00 - 11:50</option>
                            <option value="periodo6">13:10 - 14:00</option>
                            <option value="periodo7">14:00 - 14:50</option>
                            <option value="periodo8">14:50 - 15:40</option>
                            <option value="periodo9">15:50 - 16:40</option>
                            <option value="periodo10">16:40 - 17:30</option>
                            <option value="periodo11">17:55 - 18:45</option>
                            <option value="periodo12">18:45 - 19:35</option>
                            <option value="periodo13">19:35 - 20:25</option>
                            <option value="periodo14">20:35 - 21:25</option>
                            <option value="periodo15">21:25 - 22:15</option>
                        </select> -->


                    </div>
                    <div class="form-group col-md-6">
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
                                print var_dump($curso);
                                print "<option value='{$curso['id_curso']}'>{$curso['descricao_curso']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- <div style="text-align: center">
                    <legend>Favor confira todos os dados antes de Salvar !!!</legend>
                </div> -->
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>	
        </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
  </body>
</html>






<?php //include_once 'footer.php'; ?>