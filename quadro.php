<?php include_once 'header.php';


$celulas = array();
$disciplinas = array();
for ($i = 1; $i <= 75; $i++) {

    $celulas[$i] = [
        'id' => $i
    ];    

    $disciplinas[$i] = [
        'id'  => 75 + $i,
        'nome' => "disciplina".$i
    ];
}





?>

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            Disciplinas do curso
            <div class="container">
                <div class="lista-disciplinas">
                <?php 
                foreach ($disciplinas as $key => $value) { ?>
                    <div class="disciplina" id="<?php echo $value['id'];?>">
                        <?php echo $value['nome'];?>
                    </div>
                <?php } ?>
                </div>

            </div>
        </div>
        <div class="col-sm-10">
            <div class="quadro">
                <div class="topo">
                    <div class="celula">
                        <p>Horário</p>
                    </div>
                    <div class="celula">
                        <p>Segunda</p>
                    </div>
                    <div class="celula">
                        <p>Terça</p>
                    </div>
                    <div class="celula">
                        <p>Quarta</p>
                    </div>
                    <div class="celula">
                        <p>Quinta</p>
                    </div>
                    <div class="celula">
                        <p>Sexta</p>
                    </div>
                </div>
                <div class="horario">
                    <div class="celula">
                        <p>7:30 - 8:20</p>
                    </div>
                    <div class="celula">
                        <p>8:20 - 9:10</p>
                    </div>
                    <div class="celula">
                        <p>9:10 - 10:00</p>
                    </div>
                    <div class="celula">
                        <p>10:10 - 11:00</p>
                    </div>
                    <div class="celula">
                        <p>11:00 - 11:50</p>
                    </div>
                    <div class="celula">
                        <p>&nbsp;</p>
                    </div>
                    <div class="celula">
                        <p>13:10 - 14:00</p>
                    </div>
                    <div class="celula">
                        <p>14:00 - 14:50</p>
                    </div>
                    <div class="celula">
                        <p>14:50 - 15:50</p>
                    </div>
                    <div class="celula">
                        <p>15:50 - 16:40</p>
                    </div>
                    <div class="celula">
                        <p>16:40 - 17:30</p>
                    </div>
                    <div class="celula">
                        <p>&nbsp;</p>
                    </div>  
                    <div class="celula">
                        <p>17:55 - 18:45</p>
                    </div>
                    <div class="celula">
                        <p>18:45 - 19:35</p>
                    </div>
                    <div class="celula">
                        <p>19:35 - 20:35</p>
                    </div>
                    <div class="celula">
                        <p>20:35 - 21:25</p>
                    </div>
                    <div class="celula">
                        <p>21:25 - 22:15</p>
                    </div>
                </div>
                <div class="grade">
                    <?php
                        foreach ($celulas as $key => $value) {
                            if ($key == 26 || $key == 51) {
                                for ($c = 0; $c < 5; $c++) { ?>
                                    <div class="celula">
                                    <p>TO VAZIA </p>
                                    </div>
                                <?php }
                            }
                    ?>
                    <div class="celula" id="<?php echo $value['id'] != null ? $value['id'] : ''?>">
                        <!-- <p><?php echo $key;?></p> -->
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>