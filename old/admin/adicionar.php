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

$tipo = $_GET['tipo'];

if(isset($_POST['novo'])){
    // var_dump($_POST);
    $urlAtual = $_SERVER["REQUEST_URI"];

    if($_POST['novo'] === "Novo Material"){
        $status = $_POST['status'];
        $titulo = $_POST['titulo'];
        $ref = $_POST['ref'];
        $link = $_POST['link'];
        $conteudo = $_POST['conteudo'];

        $update = $db->prepare("INSERT INTO pages (ref, categoria, titulo, conteudo, link, status) VALUES ('$ref', '$tipo', '$titulo', '$conteudo', '$link', '$status')");
        $update->execute();

    }elseif($_POST['novo'] === "Novo Grupo"){
        $status = $_POST['status'];
        $titulo = $_POST['titulo'];
        $link = $_POST['link'];
        $conteudo = $_POST['conteudo'];

        $update = $db->prepare("INSERT INTO pages (categoria, titulo, conteudo, status) VALUES ('$tipo', '$titulo', '$conteudo', '$status')");
        $update->execute();
        $id = $db->lastInsertId();

        $link = "/materiais?id=$id";
        $updateL = $db->prepare("UPDATE pages SET link = '$link' WHERE id = '$id'");
        $updateL->execute();
        header("location: ./grupos");
    }elseif($_POST['novo'] === "Novo Subgrupo"){
        var_dump($_POST);
        $status = $_POST['status'];
        $titulo = $_POST['titulo'];
        $ref = $_POST['ref'];
        $link = $_POST['link'];
        $conteudo = $_POST['conteudo'];

        $update = $db->prepare("INSERT INTO pages (ref, categoria, titulo, conteudo, link, status) VALUES ('$ref', '$tipo', '$titulo', '$conteudo', '$link', '$status')");
        $update->execute();
        header("location: ./subgrupos");
    }else{

    $status = $_POST['status'];
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];
    $conteudo = $_POST['conteudo'];

    $update = $db->prepare("INSERT INTO pages (categoria, titulo, conteudo, link, status) VALUES ('$tipo', '$titulo', '$conteudo', '$link', '$status')");
    $update->execute();
    header("location: ./menus");
    }

    // header("location: $domain$urlAtual");
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
            <h1>Adicionando <?php definir($tipo); ?></h1>

            <form action="" method="post">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" name="status" id="status">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Bloqueado</option>
                </select>
                
                <label for="titulo" class="form-label">Título</label>
                <input class="form-control mb-3" type="text" id="titulo" name="titulo">
                
                <?php 
                if($tipo === 'material'){
                    $cat = "material";
                    echo '<label for="ref" class="form-label">Referência</label>';
                    echo "<input class='form-control mb-3' type='text' id='ref' name='ref'>";

                    echo '<label for="link" class="form-label">Link</label>';
                    echo '<select class="form-select mb-3" name="link" id="link">';
                    $select = $db->prepare("SELECT * FROM conteudos");
                    $select->execute();
                    $itens = $select->fetchAll(PDO::FETCH_OBJ);

                    $fragmentos = explode('id=', $link);
                    $frag = intval($fragmentos[1]);
                    foreach ($itens as $item) {
                        if($frag === $item->id){
                            echo "<option value='/pages/?id=$item->id' selected>$item->titulo</option>";
                        }else{
                            echo "<option value='/pages/?id=$item->id'>$item->titulo</option>";
                        }
                    }
                    echo '</select>';
                }elseif($tipo === 'menu-principal'){}else{ ?>
                <label for="link" class="form-label">Link</label>
                <input class="form-control mb-3" type="text" id="link" name="link">
                <?php } ?>
                
                

                <label for="conteudo" class="form-label">Conteúdo</label>
                <textarea class="form-control" name="conteudo" id="conteudo">
                </textarea>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                    <input class="btn btn-primary" type="submit" name="novo" value="Novo <?php definir($tipo); ?>">
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
            toolbar: 'fullscreen | blocks | bold italic underline | numlist bullist | link | table',

            // formatos de texto
            block_formats: 'Parágrafo=p; Título=h2; Subtítulo=h4;',
            });
        </script>
    </body>
</html>

