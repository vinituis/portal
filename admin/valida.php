<?php

session_start();

require '../components/config.php';

// var_dump($_SESSION);
// var_dump($_POST);

if(isset($_SESSION['login'])){
    $email = $_SESSION['email'];
    $nome = $_SESSION['nome'];
    $select = $db->prepare("SELECT * FROM login WHERE email = '$email' AND nome = '$nome'");
    $select->execute();
    
    $itens = $select->fetchAll(PDO::FETCH_OBJ);
    foreach ($itens as $item) {
        if($item->status == 'ativo'){
            // var_dump($item);
            $_SESSION['nome'] = $item->nome;
            echo $_SESSION['nome'];
            echo "<br>";
            $_SESSION['email'] = $item->email;
            echo $_SESSION['email'];
            echo "<br>";
            $_SESSION['depto'] = $item->depto;
            echo $_SESSION['depto'];
            echo "<br>";
            $_SESSION['perm'] = $item->perm;
            echo $_SESSION['perm'];
            echo "<br>";
            $_SESSION['login'] = true;
            echo $_SESSION['login'];
            var_dump($_SESSION['login']);
            header('location: ./home');
        }else{
            header('location: ./erro');
        }
        
    }
}else{
    $email = $_POST['email'];
    $pass = md5($_POST['senha']);
    
    // echo $pass;
    
    if(isset($_POST['login'])){
    
        $select = $db->prepare("SELECT * FROM login WHERE email = '$email' AND pass = '$pass'");
        $select->execute();
    
        $itens = $select->fetchAll(PDO::FETCH_OBJ);
    
        $conta = $select->rowCount();
    
        // var_dump($itens);
        foreach ($itens as $item) {
            if($item->status == 'ativo'){
                switch ($item->perm){
                    case '0':
                        $_SESSION['nome'] = $item->nome;
                        echo $_SESSION['nome'];
                        echo "<br>";
                        $_SESSION['email'] = $item->email;
                        echo $_SESSION['email'];
                        echo "<br>";
                        $_SESSION['depto'] = $item->depto;
                        echo $_SESSION['depto'];
                        echo "<br>";
                        $_SESSION['perm'] = $item->perm;
                        echo $_SESSION['perm'];
                        echo "<br>";
                        $_SESSION['login'] = true;
                        echo $_SESSION['login'];
                        var_dump($_SESSION['login']);
                        header('location: ./home');
                        break;
                    case '1':
                        $_SESSION['nome'] = $item->nome;
                        echo $_SESSION['nome'];
                        echo "<br>";
                        $_SESSION['email'] = $item->email;
                        echo $_SESSION['email'];
                        echo "<br>";
                        $_SESSION['depto'] = $item->depto;
                        echo $_SESSION['depto'];
                        echo "<br>";
                        $_SESSION['perm'] = $item->perm;
                        echo $_SESSION['perm'];
                        echo "<br>";
                        $_SESSION['login'] = true;
                        echo $_SESSION['login'];
                        var_dump($_SESSION['login']);
                        header('location: ./home');
                        break;
                    case '5':
                        $_SESSION['nome'] = $item->nome;
                        echo $_SESSION['nome'];
                        echo "<br>";
                        $_SESSION['email'] = $item->email;
                        echo $_SESSION['email'];
                        echo "<br>";
                        $_SESSION['depto'] = $item->depto;
                        echo $_SESSION['depto'];
                        echo "<br>";
                        $_SESSION['perm'] = $item->perm;
                        echo $_SESSION['perm'];
                        echo "<br>";
                        $_SESSION['login'] = true;
                        echo $_SESSION['login'];
                        var_dump($_SESSION['login']);
                        header('location: ./home');
                        break;
                }
            }else{
                header('location: ./erro');
            }
    
        }
    }
}



?>