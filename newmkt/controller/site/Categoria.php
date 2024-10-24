<?php 
$Ref = $_GET['id'];

$Titulo = DB::getUm("pages", array(
    'where' => array(
        'id' => $Ref
    )
));

$Itens = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'material',
        'status' => 'ativo',
        'ref' => $Ref,
    ),
    'order_by' => 'titulo ASC',
));

$Text = DB::getTodos("pages", array(
    'where' => array(
        'ref' => $Ref,
        'status' => 'ativo',
        'categoria' => 'text'
    )
));

if($Text['row_count'] == 0){
    $Texto = "";
}else{
    $Texto = $Text['res'][0]->conteudo;
}


?>