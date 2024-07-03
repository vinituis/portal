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

if(isset($_POST['upload'])){
    // var_dump($_POST);
    $Pstatus = $_POST['status'];
    $Ptitulo = $_POST['titulo'];
    $Pconteudo = $_POST['conteudo'];
    $urlAtual = $_SERVER["REQUEST_URI"];
    
    var_dump($Pconteudo);
    $conteudosS = $db->prepare("UPDATE conteudos SET status = '$Pstatus', titulo = '$Ptitulo', conteudo = '$Pconteudo' WHERE id = '$id'");
    $conteudosS->execute();
    $itensConteudos = $conteudosS->fetchAll(PDO::FETCH_OBJ);
    // header("location: ./conteudos");
}

$conteudos = $db->prepare("SELECT * FROM conteudos WHERE id = '$id'");
$conteudos->execute();
$itensConteudos = $conteudos->fetchAll(PDO::FETCH_OBJ);

foreach ($itensConteudos as $itemConteudo) {
    $titulo = $itemConteudo->titulo;
    $conteudo = $itemConteudo->conteudo;
    $status = $itemConteudo->status;

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require '../components/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/okchzd8qovz1mgp5jyyl52ke8235rt57i2haxs6rnbly3b3g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <body>

    <?php require '../components/nav-admin.php'; ?>

        <div class="container mt-5">
            <div class="row col-12 mb-1">
            <h1>Editando Conteúdo</h1>

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
                <input class="form-control mb-3" type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>

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
            plugins: 'link codesample fullscreen image lists media quickbars searchreplace table wordcount emoticons',

            // plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',

            language: 'pt_BR',

            // retira o acesso rápido ao clicar no texto
            quickbars_insert_toolbar: false,

            // menu superiror retirado do editor
            menubar: false,

            // arrastar e soltar conteúdo no editor desativado
            paste_block_drop: true,
            
            // itens de navegação
            toolbar: 'fullscreen | blocks | bold italic underline emoticons | alignleft aligncenter alignright alignjustify | numlist bullist | link image | table',

            // formatos de texto
            block_formats: 'Parágrafo=p; Título=h2; Subtítulo=h4;',

            //teste emoji
            relative_urls: false,

            // formatos de imagem
            file_picker_types: 'image',
            automatic_uploads: true,
            images_upload_url: 'insertImg.php',
        
            });
        </script>
    </body>
    <?php } ?>
</html>

