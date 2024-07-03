<?php

function InsereConsulta ($bd, $titulo, $dia, $tipo, $modalidade, $alimentacao, $servir, $quantidade, $dono) {
    require "../components/config.php";
    $agora = new DateTime();

    $dataSolicitacao = $agora->format('d/m/Y|H:i:s');
    $status = 1;
    $insere = $db->prepare("INSERT INTO $bd (titulo, data_solicitada, tipo, modalidade, alimentacao, servir, quantidade, dono, status, data_solicitacao) VALUES ('$titulo', '$dia', '$tipo', '$modalidade', '$alimentacao', '$servir', '$quantidade', '$dono', '$status', '$dataSolicitacao')");
    $insere->execute();
    // var_dump($insere);
    if($insere){
        return "Inserção realizada com sucesso!";
    }else{
        return "Ocorreu um erro";
    }

}

function converterOpcoes($elements, $var) {
    if($elements === null){}else{
        foreach($elements as $elemento) {
            // var_dump($elemento);
            if($var == NULL) {
                $var = $elemento;
            }else{
                $var = $var."|".$elemento;
            }
        }
    }
    return $var;
}

function separaEscolhas($escolhas){
    $escolhasDivididas = explode("|", $escolhas);

return $escolhasDivididas;
}