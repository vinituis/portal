<?php

session_start();

// var_dump($_SESSION);

$nomePagina = "Consulta de data";
$bd = "new_consulta";

require './components/functions.php';

if(isset($_POST['enviar'])){
    // var_dump($_POST);
    // echo "<br><br><br>";
    // var_dump($_POST['quantidade']);
    if(isset($_POST['locais'])){
        $servir = $_POST['locais'];
    }else{
        $servir = null;
    }
    if(isset($_POST['alimentos'])){
        $alimentos = $_POST['alimentos'];
    }else{
        $alimentos = null;
    }


    $dataPost = $_POST['data'];
    $data = explode("-", $dataPost);
    $dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];
    $hInicio = $_POST['horaInicio'];
    $hFim = $_POST['horaFim'];
    $alimentoCompilado = null;
    $servirCompilado = null;
    
    // Para usar no banco
    $titulo = $_POST['titulo'];
    $dataCompleta = "$dia/$mes/$ano|$hInicio|$hFim";
    $tipoEvento = $_POST['tipo'];
    $modalidade = $_POST['modalidade'];
    $alimentoCompilado = converterOpcoes($alimentos, $alimentoCompilado);
    $servirCompilado = converterOpcoes($servir, $servirCompilado);
    $quantidade = $_POST['quantidade'];
    $dono = $_SESSION['email'];

}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require '../components/head.php'; ?>

    <body>

    <?php require '../components/nav.php'; ?>

        <div class="container">
            <?php
            if(isset($_POST['enviar'])){
                echo InsereConsulta($bd, $titulo, $dataCompleta, $tipoEvento, $modalidade, $alimentoCompilado, $servirCompilado, $quantidade, $dono);
            } 
            ?>
            <div class="row m-5">
                <form action="" method="post">
                    <h3 class="h3 mb-4">Nova <?php echo $nomePagina; ?></h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Insira o título"  value="" required>
                        <label for="titulo"><b>Titulo</b></label>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="data" id="data" placeholder="Insira a data" required>
                                <label for="data"><b>Data</b></label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <input type="time" class="form-control" name="horaInicio" id="horaInicio" placeholder="Insira o horário de início" required>
                                <label for="horaInicio"><b>Horário Início</b></label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <input type="time" class="form-control" name="horaFim" id="horaFim" placeholder="Insira o horário de fim" required>
                                <label for="horaFim"><b>Horário Fim</b></label>
                            </div>
                        </div>
                        
                    </div>

                    <?php
                    echo "<label class='p-2'><b>Tipo de Evento</b></label>";
                    echo "<div class='row m-2'>";
                   
                    $sql = $db->prepare("SELECT * FROM tipo_evento WHERE status = 1");
                    $sql->execute();
                    $tipos = $sql->fetchAll(PDO::FETCH_OBJ);

                        foreach($tipos as $tipo){
                            // var_dump($tipo);
                            $desc = strip_tags($tipo->descricao);
                            echo "<div class='form-check col-3'>";
                            echo "<input class='form-check-input' type='radio' name='tipo' id='tipo' value='$tipo->id' checked>";
                            echo "<label class='form-check-label' for='[]' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$desc'>$tipo->nome</label>";
                            echo "</div>";  
                        }
                    echo "</div>";
                    // MODALIDADE
                    echo "<label class='p-2'><b>Modalidade</b></label><div class='row m-2'><div class='form-check col-3'><input class='form-check-input' type='radio' name='modalidade' id='modalidade' value='1'checked><label class='form-check-label' for='[]' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='Evento somente com participantes presentes na sede da ABIMAQ e sem transmissão.'>Presencial</label></div><div class='form-check col-3'><input class='form-check-input' type='radio' name='modalidade' id='modalidade' value='2'><label class='form-check-label' for='[]'data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='Eventos com a presença de, pelo menos, um participante inscrito presencialmente e com transmissão online.'>Híbrido</label></div><div class='form-check col-3'><input class='form-check-input' type='radio' name='modalidade' id='modalidade' value='3'><label class='form-check-label' for='[]'data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='Eventos onde a participação do público é de forma remota, sem participante presencial'>Online</label></div></div>";

                    // ALIMENTAÇÃO
                    echo "<label class='p-2'><b>Alimentação</b></label>";
                    echo "<div class='row m-2'>";

                    $sql = $db->prepare("SELECT * FROM tipo_alimentacao WHERE status = 1");
                    $sql->execute();
                    $alimentos = $sql->fetchAll(PDO::FETCH_OBJ);

                    foreach($alimentos as $alimento){
                        $desc = strip_tags($alimento->descricao);
                        echo "<div class='form-check col-3'>";
                            echo "<input class='form-check-input' type='checkbox' name='alimentos[]' value='$alimento->id' id='Alimento-$alimento->id'>";
                            echo "<label class='form-check-label' for='Alimento-$alimento->id' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$desc'>$alimento->nome</label>";
                        echo "</div>";
                    }
                    echo "</div>";

                    // Onde servir

                    echo "<label class='p-2'><b>Onde servir A&amp;B</b></label>";
                    echo "<div class='row m-2'>";

                    $sql = $db->prepare("SELECT * FROM local_servir WHERE status = 1");
                    $sql->execute();
                    $locais = $sql->fetchAll(PDO::FETCH_OBJ);

                    foreach($locais as $local){
                        echo "<div class='form-check col-3'>";
                            echo "<input class='form-check-input' type='checkbox' name='locais[]' value='$local->id' id='Local-$local->id'>";
                            echo "<label class='form-check-label' for='Local-$local->id'>$local->nome</label>";
                        echo "</div>";
                    }

                    echo "</div>";
                    ?>

                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Congresso" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3" required>
                                <label for="quantidade"><b>Quantidade de Pessoas</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mt-3">
                        <button type="submit" name="enviar" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
        </script>
    </body>
</html>