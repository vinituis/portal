<?php
$Conteudos = DB::getTodos("conteudos", array(
    'order_by' => 'status ASC, id ASC',
));

?>