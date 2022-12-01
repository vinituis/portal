<?php

$page = 'Avisos | Portal de Marketing';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '../component/head.php'; ?>
    <link rel="stylesheet" href="../assets/css/aviso.css">
</head>
<body>
    
<?php include '../component/nav.php'; ?>

<div class="container">
    <div class="avisos">
        <h1>Avisos</h1>
        <div class="aviso">
            <h2>Título do aviso</h2>
            <small class="date">11/09/2022 às 11:48</small>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, corrupti aut quas placeat libero voluptates? Dolore, quos vitae quidem, adipisci quas dolorem earum beatae dolores laborum incidunt doloremque laudantium. Architecto accusamus saepe nam nulla. Sit?</p>
            <a href="./aviso?id=1">Ler mais...</a>
        </div>
        <div class="aviso">
            <h2>Título do aviso</h2>
            <small>11/09/2022 às 11:48</small>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, corrupti aut quas placeat libero voluptates? Dolore, quos vitae quidem, adipisci quas dolorem earum beatae dolores laborum incidunt doloremque laudantium. Architecto accusamus saepe nam nulla. Sit?</p>
            <a href="./aviso?id=2">Ler mais...</a>
        </div>
    </div>
</div>

</body>
</html>