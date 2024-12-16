<?php //require 'controller/site/Home.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require 'view/site/components/Head.php'; ?>
</head>
<body>
<?php require 'view/site/components/Nav.php'; ?>
<div class="container">
    <div class="row m-5">
        <h2 class="text-center mb-5">Gerador de QRCode</h2>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="link" name="link" placeholder="" required>
                <label for="link">Link</label>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="cor" class="form-label small h-25">Cor do QRCode</label>
                    <input type="color" class="form-control form-control-color w-100 h-50" id="cor" value="#000" name="cor" title="">
                </div>
                <div class="col-8">
                    <div class="form-floating">
                        <select class="form-select" id="tipo" name="tipo">
                            <option value="SVG">SVG</option>
                        </select>
                        <label for="tipo">Formato da Exportação</label>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Gerar QRCode</button>
            </div>
        </form>
    </div>
    <div class="row m-5">
        <?php 
            if(isset($_SESSION['qrcode']) and $_SESSION['qrcode'] != null){
                echo "<div class='d-flex align-items-center justify-content-center flex-column'>".$_SESSION['qrcode']."</div>";
                echo "<a href='b-qrcode' class='btn btn-secondary'>Baixar QRCode</a>";
            }
        ?>
    </div>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>