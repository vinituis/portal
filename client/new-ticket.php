<?php

session_start();

// var_dump($_SESSION);

$nomePagina = "Criação de Ticket";
$bd = "new_ticket";

require './components/functions.php';

if(!isset($_GET['ref'])){
    
}else{ 
    require '../components/config.php';
    $refId = intval($_GET['ref']);
    $sql = $db->prepare("SELECT * FROM new_consulta WHERE id = '$refId'");
    $sql->execute();

    $sql = (object) $sql;
    // var_dump($sql);
    foreach($sql as $data){
        // var_dump($data);
        $selAlimentacao = $data[5];
        $sala = $data["sala"];
        if($sala === null){
            echo "<h1 style='text-align:center'>Esta consulta ainda não tem sala atribuida</h1>";
        }else{
            $sql = $db->prepare("SELECT * FROM new_ticket_evento WHERE ref = '$refId'");
            $sql->execute();
            $retorno = $sql->rowCount();

            if($retorno != 0){
                echo "<h1 style='text-align:center'>Esta consulta já têm ticket cadastrado</h1>";
            }else{
                

if(isset($_POST['enviar'])){
    var_dump($_POST);
    
    // echo "<br><br><br>";
    // var_dump($_POST['quantidade']);
    // if(isset($_POST['locais'])){
    //     $servir = $_POST['locais'];
    // }else{
    //     $servir = null;
    // }
    // if(isset($_POST['alimentos'])){
    //     $alimentos = $_POST['alimentos'];
    // }else{
    //     $alimentos = null;
    // }


    // $dataPost = $_POST['data'];
    // $data = explode("-", $dataPost);
    // $dia = $data[2];
    // $mes = $data[1];
    // $ano = $data[0];
    // $hInicio = $_POST['horaInicio'];
    // $hFim = $_POST['horaFim'];
    // $alimentoCompilado = null;
    // $servirCompilado = null;
    
    // // Para usar no banco
    // $titulo = $_POST['titulo'];
    // $dataCompleta = "$dia/$mes/$ano|$hInicio|$hFim";
    // $tipoEvento = $_POST['tipo'];
    // $modalidade = $_POST['modalidade'];
    // $alimentoCompilado = converterOpcoes($alimentos, $alimentoCompilado);
    // $servirCompilado = converterOpcoes($servir, $servirCompilado);
    // $quantidade = $_POST['quantidade'];
    // $dono = $_SESSION['email'];

}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php require '../components/head.php'; ?>

    <body>

    <?php require '../components/nav.php'; ?>

        <div class="container">
            <?php
            // if(isset($_POST['enviar'])){
            //     echo InsereConsulta($bd, $titulo, $dataCompleta, $tipoEvento, $modalidade, $alimentoCompilado, $servirCompilado, $quantidade, $dono);
            // } 
            ?>
            <div class="row m-5">
                <form action="" method="post">
                    <h3 class="h3 mb-4">Nova <?php echo $nomePagina; ?></h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="pre" name="pre">
                                <label class="form-check-label" for="pre">Contará com participação da Presidência</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="ass" name="ass">
                                <label class="form-check-label" for="ass">Restrito ao associado</label>
                            </div>
                        </div>
                    </div>
                    <?php
                        // ALIMENTAÇÃO
                        echo "<label class='mt-3'><b>Materiais de Divulgação</b></label>";
                        echo "<div class='row m-2'>";

                        $sql = $db->prepare("SELECT * FROM material_divulgacoes WHERE status = 1");
                        $sql->execute();
                        $divulgacoes = $sql->fetchAll(PDO::FETCH_OBJ);

                        foreach($divulgacoes as $divulgacao){
                            $desc = strip_tags($divulgacao->descricao);

                            if($divulgacao->flag === 1){
                                echo "<div class='form-check col-3'>";
                                    echo "<input class='form-check-input' type='checkbox' name='matDiv[]' value='$divulgacao->id' id='matDiv-$divulgacao->id' checked>";
                                    echo "<label class='form-check-label' for='matDiv-$divulgacao->id' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$desc'>$divulgacao->nome</label>";
                                echo "</div>";
                            }else{
                                echo "<div class='form-check col-3'>";
                                    echo "<input class='form-check-input' type='checkbox' name='matDiv[]' value='$divulgacao->id' id='matDiv-$divulgacao->id'>";
                                    echo "<label class='form-check-label' for='matDiv-$divulgacao->id' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$desc'>$divulgacao->nome</label>";
                                echo "</div>";
                            }
                        }
                        echo "</div>";
                        if($sala === 5 || $sala === 3){
                            echo "<label class='p-2'><b>Formato da sala</b></label>";
                            echo "<div class='row m-2'>";
                        
                            $sql = $db->prepare("SELECT * FROM formato_sala WHERE status = 1");
                            $sql->execute();
                            $Fsalas = $sql->fetchAll(PDO::FETCH_OBJ);

                                foreach($Fsalas as $Fsala){
                                    // var_dump($Fsala);
                                    $desc = strip_tags($Fsala->descricao);
                                    echo "<div class='form-check col-3'>";
                                    echo "<input class='form-check-input' type='radio' name='tipo' id='tipo' value='$Fsala->id' checked>";
                                    $img = '<img width="100px" src="'.$Fsala->image.'" alt="Formato '.$Fsala->nome.'">';
                                    
                                    echo "<label class='form-check-label' for='[]' data-bs-toggle='popover' data-bs-html='true' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$img'>$Fsala->nome</label>";
                                    echo "</div>";  
                                }
                            echo "</div>";
                        }else{}

                        echo "<label class='mt-3'><b>Serviços</b></label>";
                        echo "<div class='row m-2'>";

                        $sql = $db->prepare("SELECT * FROM servicos WHERE status = 1");
                        $sql->execute();
                        $servicos = $sql->fetchAll(PDO::FETCH_OBJ);

                        foreach($servicos as $servico){
                            $desc = strip_tags($servico->descricao);

                                echo "<div class='form-check col-3'>";
                                    echo "<input class='form-check-input' type='checkbox' name='servico[]' value='$servico->id' id='matDiv-$servico->id'>";
                                    echo "<label class='form-check-label' for='matDiv-$servico->id' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$desc'>$servico->nome</label>";
                                echo "</div>";
                            
                        }

                        echo "</div>";
                        
                        
                        echo "<label class='mt-3'><b>Materiais Físicos</b></label>";
                        echo "<div class='row m-2'>";

                        $sql = $db->prepare("SELECT * FROM material_fisicos WHERE status = 1");
                        $sql->execute();
                        $matFisicos = $sql->fetchAll(PDO::FETCH_OBJ);

                        foreach($matFisicos as $matFisico){
                            $desc = strip_tags($matFisico->descricao);

                                echo "<div class='form-check col-3'>";
                                    echo "<input class='form-check-input' type='checkbox' name='matFisico[]' value='$matFisico->id' id='matDiv-$matFisico->id'>";
                                    echo "<label class='form-check-label' for='matDiv-$matFisico->id' data-bs-toggle='popover' data-bs-trigger='hover focus' data-bs-placement='top' data-bs-content='$desc'>$matFisico->nome</label>";
                                echo "</div>";
                            
                        }

                        echo "</div>";

                        // var_dump(separaEscolhas($selAlimentacao));
                        $escolhas = separaEscolhas($selAlimentacao);
                        foreach($escolhas as $escolha){
                            $sql = $db->prepare("SELECT * FROM empresa_alimentacao WHERE status = 1 && tipo = '$escolha'");
                            $sql->execute();
                            $empresas = $sql->fetchAll(PDO::FETCH_OBJ);
                            foreach($empresas as $empresa){
                                echo "<div style='background-color:red;' class='p-2 m-1'>";
                                echo "<p>$empresa->nome</p><br>";
                                // var_dump($empresa->nome);
                                $opcoes = separaEscolhas($empresa->escolhas);
                                foreach($opcoes as $opcao){
                                    $sql = $db->prepare("SELECT * FROM opcoes_alimentacao WHERE status = 1 && id = '$opcao'");
                                    $sql->execute();
                                    $eOpcoes = $sql->fetchAll(PDO::FETCH_OBJ);
                                    foreach($eOpcoes as $eOpcao){
                                        echo "<div style='background-color:gray;' class='p-2 m-1'>";
                                        echo "<p>- $eOpcao->nome</p><br>";
                                        // var_dump($eOpcao);
                                        $categorias = separaEscolhas($eOpcao->escolhas);
                                        // var_dump($categorias);
                                        foreach($categorias as $categoria){
                                            $sql = $db->prepare("SELECT * FROM categoria_alimentacao WHERE status = 1 && id = '$categoria'");
                                            $sql->execute();
                                            $eCategorias = $sql->fetchAll(PDO::FETCH_OBJ);
                                            foreach($eCategorias as $eCategoria){
                                                echo "<div style='background-color:green;' class='p-2 m-1'>";
                                                echo "<p>-- $eCategoria->nome</p><br>";
                                                $itens = separaEscolhas($eCategoria->itens);
                                                // var_dump($itens);
                                                foreach($itens as $item){
                                                    $sql = $db->prepare("SELECT * FROM itens_alimentacao WHERE status = 1 && id = '$item'");
                                                    $sql->execute();
                                                    $eItens = $sql->fetchAll(PDO::FETCH_OBJ);
                                                    foreach($eItens as $eItem){
                                                        echo "<div style='background-color:blue;' class='p-2 m-1'>";
                                                        echo "<p>--- $eItem->nome</p><br>";
                                                        $detalhes = separaEscolhas($eItem->opcao);
                                                        // var_dump($detalhes);
                                                        foreach($detalhes as $detalhe){
                                                            $sql = $db->prepare("SELECT * FROM opcao_itens WHERE status = 1 && id = '$detalhe'");
                                                            $sql->execute();
                                                            $eDetalhes = $sql->fetchAll(PDO::FETCH_OBJ);
                                                            foreach($eDetalhes as $eDetalhe){
                                                                echo "<div style='background-color:lightgray;' class='p-2 m-1'>";
                                                                echo "<p>---D $eDetalhe->nome</p><br>";
                                                                echo "</div>";
                                                            }
                                                        }
                                                        echo "</div>";
                                                    }
                                                }
                                            }
                                            echo "</div>";
                                        }
                                        echo "</div>";
                                        
                                    }
                                }
                                echo "</div>";
                            }
                        }
                    ?>

                    <div class="form-floating mt-3">
                        <button type="submit" name="enviar" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
        </script>
    </body>
</html>

<?php 
            }
        }
    }
} ?>