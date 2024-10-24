<?php
$Grupos = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'menu-principal',
    ),
    'order_by' => 'status ASC, id ASC',
));

?>