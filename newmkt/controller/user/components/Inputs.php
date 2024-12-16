<?php

function getOptions($ref) {
    $campos = DB::getTodos('campos', array('where'=> array('ref'=>$ref, 'status'=>1), 'order_by'=>'id ASC'));
    return $campos;
}

function retornaCampo($campo, $req){
    switch ($campo) {
        case 'titulo':
            $input = "<label for='titulo' class='form-label'>Título</label>";
            $input .= "<input class='form-control mb-3' type='text' id='titulo' name='titulo' value=''>";
            return $input;
        break;
        case 'data':
            $input = "<div class='row'>";
                $input .= "<div class='col-6'>";
                    $input .= "<label for='dateini' class='form-label'>Data de início</label>";
                    $input .= "<input class='form-control mb-3' type='date' id='dateini' name='dateini' value=''>";
                $input .= "</div>";
                $input .= "<div class='col-6'>";
                    $input .= "<label for='dateend' class='form-label'>Data de Fim</label>";
                    $input .= "<input class='form-control mb-3' type='date' id='dateend' name='dateend' value=''>";
                $input .= "</div>";
            $input .= "</div>";
            return $input;
        break;
        case 'hora':
            $input = "<div class='row'>";
                $input .= "<div class='col-6'>";
                    $input .= "<label for='horaini' class='form-label'>Hora de início</label>";
                    $input .= "<input class='form-control mb-3' type='time' id='horaini' name='horaini' value=''>";
                $input .= "</div>";
                $input .= "<div class='col-6'>";
                    $input .= "<label for='horaend' class='form-label'>Hora de Fim</label>";
                    $input .= "<input class='form-control mb-3' type='time' id='horaend' name='horaend' value=''>";
                $input .= "</div>";
            $input .= "</div>";
            return $input;
        break;
        case 'tipo':
            $input = "<label for='tipo' class='form-label'>Tipo de Evento</label>";
            $input .= "<select class='form-select mb-3' name='tipo' id='tipo'>";
            $campos = getOptions('tipo');
            foreach($campos['res'] as $cp){
                $input .= "<option value='$cp->id'>$cp->titulo</option>";
            }
            $input .= "</select>";
            return $input;
        break;
        case 'modalidade':
            $input = "<label for='modalidade' class='form-label'>Modalidade</label>";
            $input .= "<select class='form-select mb-3' name='modalidade' id='modalidade'>";
            $campos = getOptions('modalidade');
            foreach($campos['res'] as $cp){
                $input .= "<option value='$cp->id'>$cp->titulo</option>";
            }
            $input .= "</select>";
            return $input;
        break;
        case 'alimentacao':
            $input = "<label for='alimentacao' class='form-label'>Alimentacao</label>";
            $input .= "<select class='form-select mb-3' name='alimentacao' id='alimentacao'>";
            $campos = getOptions('alimentacao');
            foreach($campos['res'] as $cp){
                $input .= "<option value='$cp->id'>$cp->titulo</option>";
            }
            $input .= "</select>";
            return $input;
        break;
        case 'ondeServir':
            $input = "<label for='onde' class='form-label'>Onde servir A&B</label>";
            $input .= "<select class='form-select mb-3' name='onde' id='onde'>";
            $campos = getOptions('ondeServir');
            foreach($campos['res'] as $cp){
                $input .= "<option value='$cp->id'>$cp->titulo</option>";
            }
            $input .= "</select>";
            return $input;
        break;
        case 'quantidade':
            $input = "<label for='quantidade' class='form-label'>Quantidade de pessoas</label>";
            $input .= "<input class='form-control mb-3' type='number' id='quantidade' name='quantidade' value=''>";
            return $input;
        break;

        
        
    }
}

?>