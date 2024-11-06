<?php
$Usuarios = DB::getTodos("login", array(
    'order_by' => 'status ASC, id ASC',
));

?>