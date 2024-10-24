<?php
require_once "controller/admin/Subgrupos.php";
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
                        <h1 class="h2">Subgrupos</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            
                        </div>
                    </div>
                </main>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th class='col-1'>#</th>
                    <th class='col-3'>Título</th>
                    <th class='col-1'>Referência</th>
                    <th class='col-4'>Conteúdo</th>
                    <th class='col-1'>Link</th>
                    <th class='col-1'>Status</th>
                    <th class='col-1' colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                foreach($Materiais['res'] as $material){
                    echo "<tr>";
                    echo "<th>$material->id</th>";
                    echo "<td>$material->titulo</td>";
                    echo "<td>$material->ref</td>";
                    echo "<td>$material->conteudo</td>";
                    echo "<td>$material->link</td>";
                    echo "<td>$material->status</td>";
                    echo "<td><a href='' class='btn btn-primary'>Editar</a></td>";
                    if($_SESSION['loginPerm'] == 0){
                        echo "<td><a href='' class='btn btn-danger'>Excluir</a></td>";
                    }else{
                        echo "<td><a href='' class='btn btn-danger disabled'>Excluir</a></td>";
                    }
                    echo "</tr>";
                }
                ?>
                    
                </tbody>
            </table>
        </div>
        

    </body>
</html>