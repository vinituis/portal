<?php
require_once "controller/admin/Adicionar.php"; 
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require 'components/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/okchzd8qovz1mgp5jyyl52ke8235rt57i2haxs6rnbly3b3g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <body>

    <?php require 'components/Nav.php'; ?>

        <div class="container mt-5">
            <div class="row col-12 mb-1">
                <h1>Inserir <?php echo ucfirst($Met); ?></h1>
            </div>
            <form action="" method="post">
                <?php 
                foreach($Campos as $campo){
                    // var_dump($Campos);
                    echo retornaCampo($campo, null);
                }
                ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                    <input class="btn btn-primary" type="submit" value="Salvar alterações">
                </div>
            </form>
        </div>
    </body>
</html>