<?php

session_start();

// inicio valida se está logado
if(isset($_SESSION['login'])){
    // echo $_SESSION['login'];
    if($_SESSION['login'] === true){
        // echo "AAAA";
    }else{
        header('location: ./');

    }
}else{
    header('location: ./');
}
// fim valida se está logado

require '../components/config.php';
require '../components/definir.php';

$id = $_GET['id'];
$met = $_GET['met'];

$conteudos = $db->prepare("SELECT * FROM $met WHERE id = '$id' AND categoria != 'navbar-item-adm'");
$conteudos->execute();
$itensConteudos = $conteudos->fetchAll(PDO::FETCH_OBJ);

foreach ($itensConteudos as $itemConteudo) {
    $categoria = $itemConteudo->categoria;
    $titulo = $itemConteudo->titulo;
    $conteudo = $itemConteudo->conteudo;
    $link = $itemConteudo->link;
    $status = $itemConteudo->status;
    $ref = $itemConteudo->ref;

if(isset($_POST['upload'])){
    var_dump($_POST);
    $Pstatus = $_POST['status'];
    $Ptitulo = $_POST['titulo'];
    $Pconteudo = $_POST['conteudo'];
    if(isset($_POST['link'])){
        $Plink = $_POST['link'];
    }else{
        $Plink = $link;
    }
    $urlAtual = $_SERVER["REQUEST_URI"];

    if(isset($_POST['ref'])) {
        $ref = $_POST['ref'];
    }else{
        $ref = 0;
    }

    $conteudos = $db->prepare("UPDATE pages SET status = '$Pstatus', titulo = '$Ptitulo', conteudo = '$Pconteudo', ref = '$ref', link = '$Plink' WHERE id = '$id'");
    $conteudos->execute();
    $itensConteudos = $conteudos->fetchAll(PDO::FETCH_OBJ);
    // header("location: $domain$urlAtual");
    if($categoria == "navbar-item"){
        header('location: ./menus');
    }
    if($categoria == "menu-principal"){
        header('location: ./grupos');
    }
    if($categoria == "material"){
        header('location: ./subgrupos');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require '../components/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/okchzd8qovz1mgp5jyyl52ke8235rt57i2haxs6rnbly3b3g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <body>

    <?php require '../components/nav-admin.php'; ?>

        <div class="container mt-5">
            <div class="row col-12 mb-1">
            <h1>Editando <?php definir($categoria); ?></h1>

            <form action="" method="post">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" name="status" id="status">
                    <!-- <option value="inativo">Bloqueado</option> -->
                    <?php 
                    if($status === 'ativo') {
                        echo "<option value='ativo'>Manter Ativo</option>";
                        echo "<option value='inativo'>Bloquear</option>";
                    }else{
                        echo "<option value='inativo'>Manter Bloqueado</option>";
                        echo "<option value='ativo'>Ativar</option>";
                    }
                    ?>
                    
                </select>
                
                <label for="titulo" class="form-label">Título</label>
                <input class="form-control mb-3" type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
                
                
                <?php 
                    //////////////////////////////
                    if($categoria === 'navbar-item'){
                        ?>
                        <label for="link" class="form-label">Link</label>
                        <input class="form-control mb-3" type="text" id="link" name="link" value="<?php echo $link; ?>">
                        <?php
                    }



                    //////////////////////////////
                    if($categoria === 'menu-principal'){
                ?>
                    <label for="link" class="form-label">Link</label>
                    <input class="form-control mb-3" type="text" id="link" name="link" value="<?php echo $link; ?>" disabled>
                <?php
                    }

                    //////////////////////////////
                    if($categoria === 'material'){
                        $cat = "material";
                        echo '<label for="ref" class="form-label">Referência</label>';
                        echo "<input class='form-control mb-3' type='text' id='ref' name='ref' value='$ref'>";

                        echo '<label for="link" class="form-label">Link</label>';
                        echo '<select class="form-select mb-3" name="link" id="link">';
                        $select = $db->prepare("SELECT * FROM conteudos");
                        $select->execute();
                        $itens = $select->fetchAll(PDO::FETCH_OBJ);

                        $fragmentos = explode('id=', $link);
                        $frag = intval($fragmentos[1]);
                        foreach ($itens as $item) {
                            if($frag == $item->id){
                                echo "<option value='/pages/?id=$item->id' selected>$item->titulo</option>";
                            }else{
                                echo "<option value='/pages/?id=$item->id'>$item->titulo</option>";
                            }
                        }
                        echo '</select>';
                    }

                ?>
                
                <!-- <input class="form-control mb-3" type="text" id="link" name="link" value="<?php echo $link; ?>" disabled> -->


                <label for="conteudo" class="form-label">Conteúdo</label>
                <textarea class="form-control" name="conteudo" id="conteudo">
                    <?php echo $conteudo; ?>
                </textarea>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                    <input class="btn btn-primary" type="submit" name="upload" value="Salvar alterações">
                </div>

                <?php 
                    
                ?>
            </form>

    
            </div>

        </div>
        <script>
            tinymce.init({
            selector: '#conteudo',
            plugins: 'link codesample fullscreen image lists media quickbars searchreplace table wordcount',

            // plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',

            language: 'pt_BR',

            // retira o acesso rápido ao clicar no texto
            quickbars_insert_toolbar: false,

            // menu superiror retirado do editor
            menubar: false,

            // arrastar e soltar conteúdo no editor desativado
            paste_block_drop: true,
            
            // itens de navegação
            toolbar: 'fullscreen | blocks | bold italic underline | numlist bullist',

            // formatos de texto
            block_formats: 'Parágrafo=p; Título=h2; Subtítulo=h4;',
            });
        </script>
    </body>
    <?php } ?>
</html>

