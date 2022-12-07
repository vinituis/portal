<?php

$charset = '<meta charset="UTF-8">';
$compatibilidade = '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$title = '<title>'.$page.'</title>';
$cssGlobal = '<link rel="stylesheet" href="../../assets/css/global.css">';
$favicon = '<link rel="icon" href="../assets/images/icon.png">';

echo $charset . $compatibilidade . $viewport . $title . $cssGlobal . $favicon;

?>