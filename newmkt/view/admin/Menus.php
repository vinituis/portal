<?php
require_once "controller/admin/Menus.php";
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
                        <h1 class="h2">Menus</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            <a href="adicionar?met=menus" class="btn btn-dark">Adicionar novo menu</a>
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
                    <th class='col-5'>Título</th>
                    <th class='col-3'>Link</th>
                    <th class='col-1'>Status</th>
                    <th class='col-2' colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                foreach($Menus['res'] as $menu){
                    echo "<tr>";
                    echo "<th>$menu->id</th>";
                    echo "<td>$menu->titulo</td>";
                    echo "<td>$menu->link</td>";
                    echo "<td>$menu->status</td>";
                    echo "<td><a href='editar?id=$menu->id&met=menus' class='btn btn-primary'>Editar</a></td>";
                    echo btnExclusao($menu->id, "menus");
                    echo "</tr>";
                }
                ?>
                    
                </tbody>
            </table>
        </div>
        

    </body>
</html>