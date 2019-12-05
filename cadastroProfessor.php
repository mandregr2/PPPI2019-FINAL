<?php include_once 'header.php';

?>
<div class='container'>
<Legend><h1>Cadastro de Professores:</h1></Legend>
    <form action="http://192.168.0.110/kinox/vardumpcolaborador.php" method="POST">

        <Legend>Status:</Legend>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="ativo" name="ativo" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Ativo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ativo" name="ativo" value="0">
            <label class="form-check-label" for="exampleRadios2">
                Inativo
            </label>
        </div>
        <Legend> Dados Principais</Legend>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputName">Nome Completo</label>
                <input type="text" <?php if (isset($nome)) {
                                        print "value='{$nome}'";
                                    }; ?> class="form-control" name="nome" placeholder="Nome Completo">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Codigo</label>
                <input type="code" <?php if (isset($codigo)) {
                                        print "value='{$codigo}'";
                                    }; ?> class="form-control" id="codigo" placeholder="Codigo">
            </div>
        </div>
        <Legend> Endereço</Legend>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Logradaouro</label>
                <input type="text" class="form-control" id="logradouro" placeholder="Rua, Av, Travessa...">
            </div>
            <div class="form-group col-md-1">
                <label for="inputCity">Numero</label>
                <input type="text" class="form-control" id="numero">
            </div>
            <div class="form-group col-md-5">
                <label for="inputAddress2">Complemento</label>
                <input type="text" class="form-control" id="complemento" placeholder="Apto, sala, bloco">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">Bairro</label>
                <input type="text" class="form-control" id="bairro">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">CEP</label>
                <input type="text" class="form-control" id="cep">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Cidade</label>
                <input type="text" value="Bento Gonçalves" class="form-control" id="cidade">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">UF</label>
                <input type="text" value="RS" class="form-control" id="estado">
            </div>
        </div>
        <legend>Documentos</legend>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">PIS</label>
                <input type="text" class="form-control" id="pis">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Número CTPS</label>
                <input type="text" class="form-control" id="ctps_nro">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Série CTPS</label>
                <input type="text" class="form-control" id="ctps_serie">
            </div>
            <div class="form-group col-md-1">
                <label for="inputCity">UF CTPS</label>
                <input type="text" class="form-control" id="ctps_uf">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Data Emissão CTPS</label>
                <input type="text" class="form-control" id="ctps_emissao">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">CPF</label>
                <input type="text" class="form-control" id="cpf">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputCity">Data de Nascimento</label>
                <input type="text" class="form-control" id="data_nascimento">
            </div>
            <div class="form-group col-md-3">
                <label for="inputCity">Local de Nascimento</label>
                <input type="text" class="form-control" id="data_nascimento">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">RG</label>
                <input type="text" class="form-control" id="rg">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Orgão Emissor</label>
                <input type="text" class="form-control" id="emissor">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Data emissão</label>
                <input type="text" class="form-control" id="data_rg">
            </div>

        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Pai</label>
            <input type="text" class="form-control" id="pai">
            <label for="exampleFormControlInput1">Nome do Mãe</label>
            <input type="text" class="form-control" id="mae">
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">CNH</label>
                <input type="text" class="form-control" id="cnh">
            </div>
            <div class="form-group col-md-1">
                <label for="inputCity">Categoria</label>
                <input type="text" class="form-control" id="cnh_cat">
            </div>

            <div class="form-group col-md">
                <label for="inputCity">Titulo Eleitoral</label>
                <input type="text" class="form-control" id="titulo">
            </div>
            <div class="form-group col-md-1">
                <label for="inputCity">Zona</label>
                <input type="text" class="form-control" id="titulo_zona">
            </div>
            <div class="form-group col-md-1">
                <label for="inputCity">Sessão</label>
                <input type="text" class="form-control" id="titulo_sessao">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Certificado Reservista</label>
                <input type="text" class="form-control" id="reservista">
            </div>
        </div>
        <legend>Dados Pessoais</legend>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">Sexo</label>
                <input type="text" class="form-control" id="sexo">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Estado Civil</label>
                <input type="text" class="form-control" id="civil">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Escolaridade</label>
                <input type="text" class="form-control" id="escolaridade">
            </div>
        </div>
        <legend>Dados Bancarios</legend>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">Banco</label>
                <select id="inputBank" class="form-control">
                    <option selected>(999) - Cash</option>
                    <option value="001">(001) - Banco do Brasil</option>
                    <option value="748">(748) - Banco Sicredi</option>
                    <option value="756">(756) - Banco Sicoob</option>
                    <option value="999">(999) - Cash</option>
                </select>
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Agencia</label>
                <input type="text" class="form-control" id="Agencia">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Conta Corrente</label>
                <input type="text" class="form-control" id="Agencia">
            </div>

        </div>
        <legend>Dados do Contrato</legend>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">Data de Admissão</label>
                <input type="text" class="form-control" id="admissao">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Departamento</label>
                <input type="text" class="form-control" id="departamento">
            </div>
            <div class="form-group col-md">
                <label for="inputCity">Função</label>
                <input type="text" class="form-control" id="funcao">
            </div>

            <div class="form-group col-md-4">
                <label for="inputState">CBO</label>
                <select id="inputState" class="form-control">
                    <option selected>Escolher...</option>
                    <option value="2527-05">(2527-05) - Aunalista de PCP</option>
                    <option value="4141-05">(4141-05) - Auxiliar de Almoxarifado</option>
                    <option value="7842-05">(7842-05) - Auxiliar geral de Produção</option>
                    <option value="2624-10">(2624-10) - Desenhista Industrial Grafico</option>
                    <option value="2525-45">(2525-45) - Financeiro</option>
                    <option value="7213-25">(7213-25) - Polidor</option>
                    <option value="3182-05">(3182-05) - Projetista</option>
                    <option value="7243-15">(7243-15) - Soldador</option>
                    <option value="1412-05">(1412-05) - Supervisor Industrial</option>
                    <option value="7212-15">(7212-15) - Torneiro Mecânico</option>
                    <option value="3541-45">(3541-45) - Vendedor Externo</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">Horário</label>
                <input value="07:12 as 12:00 e das 13:00 as 17:00 com intervalo das 12:00 as 13:00" type="text" class="form-control" id="horario">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">Remuneração</label>
                <input type="text" class="form-control" id="remuneracao">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Insalubridade</label>
                <input type="text" class="form-control" id="insalubridade" placeholder="sim/não">
            </div>

            <div class="form-group col-md-2">
                <label for="inputCity">Vale Transporte</label>
                <input type="text" class="form-control" id="vale_transporte" placeholder="sim/não">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCity">Prazo Experiência</label>
                <input type="text" class="form-control" id="vale_transporte" value="45 dias + 45 dias">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCity">Observações</label>
                <input type="text" class="form-control" id="observaoes">
            </div>
        </div>
        <div align="right">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        <div align="center">
            <legend>Favor confira todos os dados antes de Salvar !!!</legend>
        </div>


    </form>
</div>

<?php include_once 'footer.php'; ?>