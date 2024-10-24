<?php 
$Nav = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'navbar-item',
        'status' => 'ativo',
    ),
    'order_by' => 'id ASC',
));


?>