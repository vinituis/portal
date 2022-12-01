<?php

$page = 'Avisos | Portal de Marketing';

$id = $_GET['id'];

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
    <div class="aviso">
        <h1>Título do Aviso #<?php echo $id; ?></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quasi eius dolor vero iusto fuga quos culpa facere voluptas id laborum voluptatem quisquam excepturi provident repudiandae expedita enim ullam natus earum eligendi magnam, architecto nobis assumenda? Aut, deleniti cupiditate ad expedita, natus eos omnis fugit aliquam, voluptate illum alias sint. Dolore fugit debitis placeat alias cupiditate eveniet, ipsa tempore! Quis error praesentium porro animi placeat, consectetur facilis pariatur eveniet, magnam velit quae laboriosam quaerat hic dignissimos labore. Inventore in iusto deserunt ab sequi corrupti temporibus voluptatibus obcaecati illo minima fugiat optio amet, sit voluptates consequuntur vitae nesciunt maxime autem ex magni quisquam aperiam tenetur exercitationem. Placeat facere sunt corrupti nemo.</p>
        <a href="./avisos">&#8594 Retornar para os avisos</a>
    </div>
</div>

</body>
</html>