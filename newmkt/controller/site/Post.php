<?php
$Ref = $_GET['id'];

$Post = DB::getUm("conteudos", array(
    'where' => array(
        'id' => $Ref,
        'status' => 'ativo'
    )
));

// var_dump($Post);



?>