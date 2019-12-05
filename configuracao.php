<?php
include_once "header.php";
if (!isset($_POST['usuario'])) {
    $nick = "";
} else {
    $nick = $_POST['usuario'];
};
?>

<!-- CONTEUDO -->

<!-- CONFIGURACOES DE ACESSO -->
<div class="container">
    <div class="row">

        <div class='col'>
            <Legend> Configuração de Usuários e Acessos</Legend>
            </br>
            </br>
            </br>
            </br>
            </br>
            <p> Selecione um usuário para configurações --></p>
        </div>
        <div class='col'>


            <Legend> Usuarios</Legend>

            <?php
            //usuarios
            if (($arquivo = fopen("usuario.csv", "r")) !== false) {
                $usuarios = [];
                $linha = fgetcsv($arquivo, 500, ',');
                while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                    $usuarios[] = [
                        'nickname' => $linha[0],
                    ];
                };
            } else {
                die("arquivo de configuracao não existe");
            };
            foreach ($usuarios as $usuario) {
                echo "<div class='col-4' >";
                echo "<form class='form-group' name='nickname' method='POST' action='#'>";
                echo "<input type='hidden' name='usuario' value='{$usuario['nickname']}'></input>";
                if ($nick == $usuario['nickname']) {
                    $cor_botao = "btn btn-success btn-block";
                } else {
                    $cor_botao = "btn btn-light btn-block";
                };
                echo "<button type='submit'  value='{$nick}' class='{$cor_botao}' >
                <i class='fa fa-user-o fa-2x'></i></br> {$usuario['nickname']}
                              </button>";
                echo "</form>";
                echo "  </div>";
            };
            ?>
        </div>

        <div class='col'>
            <form action="http://<?= $_SESSION['ip'] ?>/permissoes.php" type='permissoes[]' method="POST">
                <Legend>Acessos</Legend>
                <?php
                //permissoes
                if (($arquivo = fopen("permissoes.csv", "r")) !== false) {
                    $permissoes = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $permissoes[] = [
                            'nickname' => $linha[0],
                            'id_acesso' => $linha[1]
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };
                //modulos

                if (($arquivo = fopen("modulos.csv", "r")) !== false) {
                    $modulos2 = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $modulos2[] = [
                            'id_modulo' => $linha[0],
                            'descricao_modulos' => $linha['1']
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };
                //acessos
                if (($arquivo = fopen("acessos.csv", "r")) !== false) {
                    $acessos2 = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $acessos2[] = [
                            'id_acesso' => $linha[0],
                            'id_modulo' => $linha[1],
                            'descricao_acesso' => $linha[2],
                            'link' => $linha[3],
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };

                //todos os modulos e acessos independente da permissao

                //modulos
                if (($arquivo = fopen("modulos.csv", "r")) !== false) {
                    $modulos3 = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $modulos3[] = [
                            'id_modulo' => $linha[0],
                            'descricao_modulos' => $linha['1']
                        ];
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };
                //acessos
                $maior_id = 0;
                if (($arquivo = fopen("acessos.csv", "r")) !== false) {
                    $acessos3 = [];
                    $linha = fgetcsv($arquivo, 500, ',');
                    while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                        $acessos3[] = [
                            'id_acesso' => $linha[0],
                            'id_modulo' => $linha[1],
                            'descricao_acesso' => $linha[2],
                            'link' => $linha[3],
                        ];
                        if ($linha[0] > $maior_id) {
                            $maior_id = $linha[0];
                        } else { };
                    };
                } else {
                    die("arquivo de configuracao não existe");
                };
                $maior_id = ($maior_id + 1);


                $anterior_modulo3 = 0;
                $checked = "";
                $nickname = "";
                $botao = "";
                $permissao = [];
                $i = 0;
                foreach ($modulos3 as $modulo3) {
                    //imprime o nome do modulo uma unica vez
                    if ($anterior_modulo3 !== $modulo3['descricao_modulos']) {
                        echo "<div class='col' alig='right'>
                                 <h2 class='link-titulo badge badge-lg badge-secondary'>
                                {$modulo3['descricao_modulos']}
                                </h2>";
                        //imprime os acessos do modulo
                        foreach ($acessos3 as $acesso3) {
                            //compara se o acesso é do modulo em questao
                            if ($modulo3['id_modulo'] == $acesso3['id_modulo']) {
                                //verifica se o usuario selecionado tem acesso e ja marca no checkbox

                                foreach ($permissoes as $permissao) {

                                    if ($nick === $permissao['nickname'] && $permissao['id_acesso'] === $acesso3['id_acesso']) {
                                        $checked = "checked";
                                        $nickname = $permissao['nickname'];
                                        $i++;
                                        break;
                                    } else {
                                        $checked = "";
                                        $nickname = "";
                                        $acesso = "";
                                    };
                                };
                                $botao = $acesso3['id_acesso'];
                                echo " <div class='col' >
                                             <input class='form-check-input' type='hidden' name='usuario' value='{$nick}'>
                                            
                                           <input class='form-check-input' name='botao[]' value='{$botao}' type='checkbox' {$checked}>
                                              <label class='form-check-label' for='inlineCheckbox1'>
                                             <h6 class='link-titulo'>
                                                {$acesso3['descricao_acesso']}
                                           </h6>
                                          </label>
                                                   </div>";
                            } else { };
                        };
                        echo "</div>";
                    } else { };
                    $anterior_modulo3 = $modulo3['descricao_modulos'];
                };

                ?>
                <div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o "></i> Salvar</button>
            </form>
        </div>
    </div>

</div>
<!-- CONFIGURACOES DE ACESSO -->

<!-- CADASTRO USUARIOS -->

</div>
<div class='container'>
    <form action="http://<?= $_SESSION['ip'] ?>/usuarios.php" method="POST">
        <Legend>Cadastro de Usuários</Legend>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputName">Login</label>
                <input type="text" class="form-control" name="nickname" placeholder="Login com no máximo 10 letras">
            </div>
            <div class="form-group col-md-10">
                <label for="inputName">Senha</label>
                <input type="password" class="form-control" name="password" placeholder="senha com no maximo 10 caracteres">
            </div>
            <div class="form-group col-md-10">
                <label for="inputName">Confirmação de Senha</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-md-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o "></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
<!-- CADASTRO USUARIOS -->
<!-- CADASTRO MODULOS -->
</div>
<div class='container'>
    <form action="http://<?= $_SESSION['ip'] ?>/modulos.php" method="POST">
        <Legend>Cadastro de Módulos</Legend>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputName">Código</label>
                <select name="modulo" class="form-control">
                    <option>Escolher...</option>

                    <?php
                    //modulos
                    if (($arquivo = fopen("modulos.csv", "r")) !== false) {
                        $modulos = [];
                        $linha = fgetcsv($arquivo, 500, ',');
                        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                            $modulos[] = [
                                'id_modulo' => $linha[0]
                            ];
                        };
                    } else {
                        die("arquivo de configuracao não existe");
                    };
                    for ($i = 1; $i < 30; $i++) {
                        $existe = false;
                        foreach ($modulos as $modulo) {
                            if ($modulo['id_modulo'] == $i) {
                                $existe = true;
                                break;
                            } else { };
                        };
                        if (!$existe) {
                            echo "<option value='{$i}'>{$i}</option>";
                        }
                    };
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="inputName">Nome</label>
                <input type="text" class="form-control" name="descricao_modulo" placeholder="Nome do Módulo">
            </div>
            <div class="form-group col-md-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o "></i> Salvar</button>
            </div>
        </div>


    </form>
</div>
<!-- CADASTRO MODULOS -->


<!-- CADASTRO ACESSOS PHP -->
</div>
<div class='container'>
    <form action="http://<?= $_SESSION['ip'] ?>/acessos.php" method="POST">
        <Legend>Cadastro de Acessos</Legend>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="hidden" name='id_acesso' value="<?= $maior_id ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">Módulo</label>
                <select name="id_modulo" class="form-control">
                    <option>Escolher...</option>

                    <?php
                    //modulos
                    if (($arquivo = fopen("modulos.csv", "r")) !== false) {
                        $modulos = [];
                        $linha = fgetcsv($arquivo, 500, ',');
                        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {
                            $modulos[] = [
                                'id_modulo' => $linha[0],
                                'descricao_modulos' => $linha[1]
                            ];
                        };
                    } else {
                        die("arquivo de configuracao não existe");
                    };

                    foreach ($modulos as $modulo) {

                        echo "<option value='{$modulo['id_modulo']}'>{$modulo['descricao_modulos']}</option>";
                    };
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputName">Nome da Pagina</label>
                <input type="text" class="form-control" name="descricao" placeholder="Nome da Pagina Acess ex. Clientes">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputName">Nome do Formulario PHP</label>
                <input type="text" class="form-control" name="link" placeholder="ex. cliente.php">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputName">Icone</label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-inline">
                <input class='form-check-input' name='id_icone' value='fa fa-home' type='radio' checked>
                <i class="fa fa-home fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-sign-out' type='radio'>
                <i class="fa fa-sign-out fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-id-card' type='radio'>
                <i class="fa fa-id-card fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-calendar-check-o' type='radio'>
                <i class="fa fa-calendar-check-o fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-user' type='radio'>
                <i class="fa fa-user fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-graduation-cap' type='radio'>
                <i class="fa fa-graduation-cap fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-bars' type='radio'>
                <i class="fa fa-bars fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-wrench' type='radio'>
                <i class="fa fa-wrench fa-2x"></i>
                <input class='form-check-input' name='id_icone' value='fa fa-book' type='radio'>
                <i class="fa fa-book fa-2x"></i>

            </div>
        </div>
        </br>
        <div class="form-row">
            <div class="form-group col-md">

                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o "></i> Salvar</button>
            </div>
        </div>


    </form>
</div>
<!-- CADASTRO ACESSOS -->
<!-- CONTEUDO -->
<?php include_once "footer.php"; ?>