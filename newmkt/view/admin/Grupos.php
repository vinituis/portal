<?php
require_once "controller/admin/Grupos.php";
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
                        <h1 class="h2">Grupos</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            
                        </div>
                    </div>
                </main>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th class='col-1'>#</th>
                    <th class='col-2'>Título</th>
                    <th class='col-6'>Conteúdo</th>
                    <th class='col-1'>Link</th>
                    <th class='col-1'>Status</th>
                    <th class='col-1' colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                foreach($Grupos['res'] as $grupo){
                    echo "<tr>";
                    echo "<th>$grupo->id</th>";
                    echo "<td>$grupo->titulo</td>";
                    echo "<td>$grupo->conteudo</td>";
                    echo "<td>$grupo->link</td>";
                    echo "<td>$grupo->status</td>";
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