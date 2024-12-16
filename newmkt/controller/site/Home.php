<?php 

$Itens = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'menu-principal',
        'status' => 'ativo',
    ),
    'order_by' => 'titulo ASC',
));


?>