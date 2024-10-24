<?php 
$Nav = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'navbar-item-adm',
        'status' => 'ativo',
    ),
    'order_by' => 'id ASC',
));


?>