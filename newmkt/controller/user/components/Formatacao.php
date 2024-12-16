<?php

function FormataDataEHora($data, $hora) {
    $date = explode("-", $data);
    $ano = $date[0];
    $mes = $date[1];
    $dia = $date[2];
    $hour = explode(":", $hora);
    $h = $hour[0];
    $m = $hour[1];
    $s = $hour[2];
    return "$dia/$mes/$ano às $h:$m";
}

function FormataStatus($status, $mod) {
    switch ($mod) {
        case 'consultas':
            switch ($status) {
                case '2':
                    return array(
                        'text' => "Cancelado",
                        'badge' => "<span class='badge text-bg-danger'>Cancelado</span>",
                    );
                break;
                case '0':
                    return array(
                        'text' => "Não Agendado",
                        'badge' => "<span class='badge text-bg-warning'>Não Agendado</span>", 
                    );
                break;
                case '1':
                    return array(
                        'text' => "Agendado",
                        'badge' => "<span class='badge text-bg-success'>Agendado</span>",
                        
                    );
                break;
            }
        break;
        
        default:
            # code...
        break;
    }
}


?>