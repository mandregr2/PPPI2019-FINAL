<?php include_once 'header.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    if (isset($_SESSION['idBloqueio'])) {
        $id = $_SESSION['idBloqueio'];
    } else { };
};

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
    if ($professor['id'] == $id) {
        $id = $professor['id'];
        $nome = $professor['nome'];
        $cpf = $professor['cpf'];
    }
}

$Horarios[1] = "07:30 - 08:20";
$Horarios[2] = "08:20 - 09:10";
$Horarios[3] = "09:10 - 10:00";
$Horarios[4] = "10:10 - 11:00";
$Horarios[5] = "11:00 - 11:50";
$Horarios[6] = "13:10 - 14:00";
$Horarios[7] = "14:00 - 14:50";
$Horarios[8] = "14:50 - 15:40";
$Horarios[9] = "15:50 - 16:40";
$Horarios[10] = "16:40 - 17:30";
$Horarios[11] = "17:55 - 18:45";
$Horarios[12] = "18:45 - 19:35";
$Horarios[13] = "19:35 - 20:25";
$Horarios[14] = "20:35 - 21:25";
$Horarios[15] = "21:25 - 22:15";

?>
<style>
    

    .atletas {
        display: flex;
        flex-direction: row;
        flex-wrap: felx;
        justify-content: center;
    }

    .atleta {
        width: 250px;
        background-color: #fff;
        border-radius: 10px;
        margin: 15px;
        padding: 5px 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .atleta strong {
        margin-top: 10px;
        flex-grow: 1;
        text-align: center
    }

    .atleta small {
        margin-top: 5px
    }
</style>
<div class="container">

    <Legend>
        <h1>Bloqueio de Horários:</h1>
    </Legend>

    <Legend> Dados Principais</Legend>
    <div class="form-row">
        <div class="form-group col-md-1">
            <label for="inputName">Código</label>
            <input type="text" class="form-control" value='<?= $id ?>' disabled>
        </div>

        <div class="form-group col-md-8">
            <label for="inputName">Nome Completo</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value='<?= $nome ?>' disabled>
        </div>

        <div class="form-group col-md">
            <label for="inputName">CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="CPF" value='<?= $cpf ?>' disabled>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md">
            <a class="btn btn-warning " href="professor.php">
                <h4>Voltar</h4>
            </a>
        </div>
    </div>

    <Legend>Bloqueios</Legend>
    <span class="badge badge-danger">
        <h4>Bloqueado</h4>
    </span>
    <span class="badge badge-success">
        <h4>Disponível</h4>
    </span>
</div>


</div>

<div class="container">
    <?php
    if (($arquivo = fopen("bloqueios.csv", "r")) !== false) {
        $bloqueios = [];
        $linha = fgetcsv($arquivo, 500, ',');
        while (($linha = fgetcsv($arquivo, 500, ',')) !== false) {

            $bloqueios[] = [
                'id' => $linha[0],
                'idHora' => $linha[1],
            ];
        };
    } else {
        die("arquivo de configuracao não existe");
    };
    $bloqueiosID = [];
    foreach ($bloqueios as $bloqueio) {
        if ($bloqueio['id'] == $id) {
            $bloqueiosID[$bloqueio['idHora']] = [
                'idHora' => $bloqueio['idHora']
            ];
        } else { }
    }
    ?>
    <div class='atletas'>


        <div class='atleta'>
            <div class='btn btn-block btn-info'>
                <h4>Segunda</h4>
            </div>

            <?php
            $hora = 1;
            for ($i = 101; $i < 116; $i++) {
                if (isset($bloqueiosID[$i])) {
                    $link = 'desbloqueiaHora.php';
                    $value = 1;
                    $class = 'btn btn-block btn-danger';
                    $texto = $Horarios[$hora];
                }
                if (!isset($bloqueiosID[$i])) {

                    $link = 'bloqueiaHora.php';
                    $value = 0;
                    $class = 'btn btn-block btn-success';
                    $texto = $Horarios[$hora];
                }



                echo "      
                           
                <div class='{$class}'><h5>
                <form action='http://{$_SESSION['ip']}/{$link}' method='POST'>
                   <input type='hidden' name='id' value='{$id}'>
                   <input type='hidden' name='idHora' value='{$i}'>
                    <button type ='submit' class='{$class}' >{$texto}</button>
                                                            
                </form>
                </h5>
           </div>";
                $hora++;
            }
            ?>
        </div>


        <div class='atleta'>
            <div class='btn btn-block btn-info'>
                <h4>Terça</h4>
            </div>

            <?php
            $hora = 1;
            for ($i = 116; $i < 131; $i++) {
                if (isset($bloqueiosID[$i])) {
                    $link = 'desbloqueiaHora.php';
                    $value = 1;
                    $class = 'btn btn-block btn-danger';
                    $texto = $Horarios[$hora];
                }
                if (!isset($bloqueiosID[$i])) {

                    $link = 'bloqueiaHora.php';
                    $value = 0;
                    $class = 'btn btn-block btn-success';
                    $texto = $Horarios[$hora];
                }





                echo "      
                           
                <div class='{$class}'><h5>
                <form action='http://{$_SESSION['ip']}/{$link}' method='POST'>
                   <input type='hidden' name='id' value='{$id}'>
                   <input type='hidden' name='idHora' value='{$i}'>
                    <button type ='submit' class='{$class}' >{$texto}</button>
                                                            
                </form>
                </h5>
           </div>";
                $hora++;
            }
            ?>
        </div>

        <div class='atleta'>
            <div class='btn btn-block btn-info'>
                <h4>Quarta</h4>
            </div>

            <?php
            $hora = 1;
            for ($i = 131; $i < 146; $i++) {
                if (isset($bloqueiosID[$i])) {
                    $link = 'desbloqueiaHora.php';
                    $value = 1;
                    $class = 'btn btn-block btn-danger';
                    $texto = $Horarios[$hora];
                }
                if (!isset($bloqueiosID[$i])) {

                    $link = 'bloqueiaHora.php';
                    $value = 0;
                    $class = 'btn btn-block btn-success';
                    $texto = $Horarios[$hora];
                }





                echo "      
                           
                <div class='{$class}'><h5>
                <form action='http://{$_SESSION['ip']}/{$link}' method='POST'>
                   <input type='hidden' name='id' value='{$id}'>
                   <input type='hidden' name='idHora' value='{$i}'>
                    <button type ='submit' class='{$class}' >{$texto}</button>
                                                            
                </form>
                </h5>
           </div>";
                $hora++;
            }
            ?>
        </div>
        <div class='atleta'>
            <div class='btn btn-block btn-info'>
                <h4>Quinta</h4>
            </div>

            <?php
            $hora = 1;
            for ($i = 146; $i < 161; $i++) {
                if (isset($bloqueiosID[$i])) {
                    $link = 'desbloqueiaHora.php';
                    $value = 1;
                    $class = 'btn btn-block btn-danger';
                    $texto = $Horarios[$hora];
                }
                if (!isset($bloqueiosID[$i])) {

                    $link = 'bloqueiaHora.php';
                    $value = 0;
                    $class = 'btn btn-block btn-success';
                    $texto = $Horarios[$hora];
                }





                echo "      
                           
                <div class='{$class}'><h5>
                <form action='http://{$_SESSION['ip']}/{$link}' method='POST'>
                   <input type='hidden' name='id' value='{$id}'>
                   <input type='hidden' name='idHora' value='{$i}'>
                    <button type ='submit' class='{$class}' >{$texto}</button>
                                                            
                </form>
                </h5>
           </div>";
                $hora++;
            }
            ?>
        </div>
        <div class='atleta'>
            <div class='btn btn-block btn-info'>
                <h4>Sexta</h4>
            </div>

            <?php
            $hora = 1;
            for ($i = 161; $i < 176; $i++) {
                if (isset($bloqueiosID[$i])) {
                    $link = 'desbloqueiaHora.php';
                    $value = 1;
                    $class = 'btn btn-block btn-danger';
                    $texto = $Horarios[$hora];
                }
                if (!isset($bloqueiosID[$i])) {

                    $link = 'bloqueiaHora.php';
                    $value = 0;
                    $class = 'btn btn-block btn-success';
                    $texto = $Horarios[$hora];
                }



                echo "      
                           
                <div class='{$class}'><h5>
                <form action='http://{$_SESSION['ip']}/{$link}' method='POST'>
                   <input type='hidden' name='id' value='{$id}'>
                   <input type='hidden' name='idHora' value='{$i}'>
                    <button type ='submit' class='{$class}' >{$texto}</button>
                                                            
                </form>
                </h5>
           </div>";
                $hora++;
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <a class="btn btn-warning btn-block" href="professor.php">
        <h4>Voltar</h4>
    </a>

</div>

</form>
</div>
<?php include_once 'footer.php';
?>