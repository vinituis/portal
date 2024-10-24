<?php require 'controller/site/Post.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require 'components/Head.php'; ?>
</head>
<body>
<?php require 'components/Nav.php'; ?>
<div class="container mt-3">
    <div class="row col-12 mb-1 mt-4">
        <?php
            echo "<h1 class='col-12 py-1'>$Post->titulo</h1>";
            echo "<p>$Post->conteudo</p>";
        ?> 
    </div> 
    <p class="text-center mt-3 p-3">
        Caso não encontre o assunto desejado, pedimos que envie e-mail para marketing@abimaq.org.br com sua solicitação.
    </p>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>