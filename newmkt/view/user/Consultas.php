<?php 
require_once "controller/user/components/Inputs.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require 'components/head.php'; ?>

    <body>

    <?php require 'components/Nav.php'; ?>

        <div class="container">
            <div class="row">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Solicitação de disponibilidade</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            
                        </div>
                    </div>
                </main>
            </div>
            <form action="" method="post">
                <?php
                    $Campos = array('titulo', 'data', 'hora', 'tipo', 'modalidade', 'alimentacao', 'ondeServir', 'quantidade');
                    foreach($Campos as $campo){
                        echo retornaCampo($campo, null);
                    }
                ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                    <input class="btn btn-primary" type="submit" value="Enviar">
                </div>
            </form>
        </div>
        

    </body>
</html>