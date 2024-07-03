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

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require '../components/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/okchzd8qovz1mgp5jyyl52ke8235rt57i2haxs6rnbly3b3g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <body>

    <?php require '../components/nav-admin.php'; ?>
        <form action="../components/addtk.php" method="post">
            <div class="container">
                <div class="row">
                    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Adicionar novo Ticket de Material</h1>
                        </div>
                    </main>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="quando" placeholder="" name="quando" required>
                            <label for="quando">Prazo desejado</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="titulo" placeholder="" name="titulo" required>
                            <label for="titulo">Título</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="conteudo" class="form-label">Conteúdos e Informações</label>
                        <textarea class="form-control" name="conteudo" id="conteudo" required>
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <h2 class="h2 mb-3 mt-3">Serviços necessários</h2>
                    <?php
                        $servicos = $db->prepare("SELECT * FROM tkelemento WHERE type = 'servico' AND status = 'ativo'");
                        $servico = $servicos->execute();
                        $servs = $servicos->fetchAll(PDO::FETCH_OBJ);

                        foreach ($servs as $serv) {
                    ?>
                    
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="servico" name="servico[]" value="<?php echo $serv->id; ?>">
                            <label class="form-check-label" for="servico[]"><?php echo $serv->titulo; ?></label>
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                </div>
                
                <div class="d-grid gap-2 col-12 mx-auto">
                    <button class="btn btn-dark mt-3" type="submit" name="newMat">Enviar solicitação</button>
                    <a class="btn" href="./home">Cancelar</a>
                </div>
            </div>
        </form>
        

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
            toolbar: 'fullscreen | blocks | bold italic underline | numlist bullist | link image | table',

            // formatos de texto
            block_formats: 'Parágrafo=p; Título=h2; Subtítulo=h4;',

            // formatos de imagem
            file_picker_types: 'image',
            automatic_uploads: true,
            images_upload_url: 'insertImg.php',
            });
        </script>
    </body>
</html>