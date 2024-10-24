<?php
$Materiais = DB::getTodos("pages", array(
    'where' => array(
        'categoria' => 'material',
    ),
    'order_by' => 'status ASC, id ASC',
));

?>