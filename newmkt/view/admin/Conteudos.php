<?php
require_once "controller/admin/Conteudos.php";
require_once 'components/Excluir.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require 'components/Head.php'; ?>

    <body>

    <?php require 'components/Nav.php'; ?>

        <div class="container">
            <div class="row">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Conteúdos</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            <a href="adicionar?met=conteudos" class="btn btn-dark">Adicionar novo menu</a>
                        </div>
                    </div>
                </main>
            </div>
            <?php
                if(isset($_SESSION['adminMsg']) and $_SESSION['adminMsg'] != null){
                    echo $_SESSION['adminMsg'];
                    $_SESSION['adminMsg'] = null;
                }
            ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th class='col-1'>#</th>
                    <th class='col-9'>Título</th>
                    <th class='col-1'>Status</th>
                    <th class='col-1' colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                foreach($Conteudos['res'] as $conteudo){
                    echo "<tr>";
                    echo "<th>$conteudo->id</th>";
                    echo "<td>$conteudo->titulo</td>";
                    echo "<td>$conteudo->status</td>";
                    echo "<td><a href='editar?id=$conteudo->id&met=conteudos' class='btn btn-primary'>Editar</a></td>";
                    echo btnExclusao($conteudo->id, "conteudos");
                    echo "</tr>";
                }
                ?>
                    
                </tbody>
            </table>
        </div>
        

    </body>
</html>