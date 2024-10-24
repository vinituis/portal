<?php
require './components/config.php';

$menuPrincipal->execute();
$itens = $menuPrincipal->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-br">
    
<?php require './components/head.php'; ?>

<body>

<?php require './components/nav.php'; ?>

<div class="container mt-3">
    <img src="./img/banner.png" class="img-fluid" alt="" width="100%">
    <p class="text-center p-2 mt-3">
        <span class="fw-semibold h6">O Portal de Comunicação é destinado exclusivamente aos colaboradores da ABIMAQ/SINDIMAQ, com o objetivo de disseminar as informações e os processos que envolvem a diretoria de Comunicação, Marketing e Feiras.</span>
        <br><br>
        Clicando no assunto desejado, você será direcionado para orientações e processos de solicitação para cada tipo de material e evento.
        
    </p>
    <div class="row col-12 mb-1 mt-4">
        <?php
        foreach ($itens as $item) {
        ?>
        <div class="col-md-6 mb-4 ">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $item->titulo; ?></h4>
                <p class="card-text"><?php echo $item->conteudo; ?></p>
                <a href="<?php echo $dominio.'/pages'.$item->link; ?>" class="btn btn-primary">Acessar</a>
            </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div> 
    <p class="text-center mt-3 p-3">
        Caso não encontre o assunto desejado, pedimos que envie e-mail para marketing@abimaq.org.br com sua solicitação.
    </p>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>