<?php
$Menus = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'navbar-item',
    ),
    'order_by' => 'status ASC, id ASC',
));

?>