<?php

function Paginas($table, $PorPage, $Page) {

    if($Page < 1){
        $Page = 0;
    }else{
        $Page = $Page * $PorPage;
    }

    // var_dump($Page);

    $ConsultasTotal = DB::getTodos($table, [
        'order_by' => 'status ASC, dateini DESC',
    ]);

    $Total = $ConsultasTotal['row_count'];

    $teste =  ($Total) / $PorPage;
    $TotalPages = round($teste);

    $Consultas = DB::getTodos($table, [
        'order_by' => 'status ASC, dateini DESC',
        'start' => $Page,
        'limit' => $PorPage,
    ]);

    $Paginacao = "<table class='table table-striped table-hover'>";
        $Paginacao .= "<h2 class='h1'>Agendamentos</h2>";
            $Paginacao .= "<thead>";
                    $Paginacao .= "<tr>";
                    // $Paginacao .= "<th class='col-1'>#</th>";
                    $Paginacao .= "<th class='col-2'>Data</th>";
                    $Paginacao .= "<th class='col-3'>Solicitação</th>";
                    $Paginacao .= "<th class='col-1'>Titulo</th>";
                    $Paginacao .= "<th class='col-1'>Status</th>";
                    $Paginacao .= "<th class='col-3'>Responsável</th>";
                    $Paginacao .= "<th class='col-2'>Ação</th>";
                    $Paginacao .= "</tr>";
                $Paginacao .= "</thead>";
     $Paginacao .= "<tbody class='table-group-divider'>";

    foreach($Consultas['res'] as $data){
        
        $Paginacao .= "<tr>";
            // $Paginacao .= "<th>$data->id</th>";
            $DataEHora = FormataDataEHora($data->dateini, $data->horaini);
            $Paginacao .= "<th>$DataEHora</th>";
            $Paginacao .= "<td>Agendamento de sala</td>";
            $Paginacao .= "<td>$data->titulo</td>";
            $Status = FormataStatus($data->status, 'consultas')['badge'];
            $Paginacao .= "<td>$Status</td>";
            $Paginacao .= "<td>$data->responsavel</td>";
            $Paginacao .= "<td><a href='detalhe?id=$data->id' class='btn btn-secondary'>Ver detalhes</a></td>";
        $Paginacao .= "</tr>";
    
        
    }

        $Paginacao .= "</tbody>";
        $Paginacao .= "</table>";

        $Paginacao .= "<div class='d-grid gap-2 d-md-flex justify-content-md-end mt-3'>";
        $Paginacao .= "<nav aria-label='Page navigation example'>";
            $Paginacao .= "<ul class='pagination'>";
                $i = 1;

                while($i <= $TotalPages) {
                    $link = $i - 1;
                    $Paginacao .= "<li class='page-item'><a class='page-link' href='?pgag=$link'>$i</a></li>";
                    $i++;
                }
                
            $Paginacao .= "</ul>";
        $Paginacao .= "</nav>";
    $Paginacao .= "</div>";

    return $Paginacao;
}




?>