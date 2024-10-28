<?php

function btnExclusao($id, $met) {
    if($_SESSION['loginPerm'] == 0){
        $BtnExcluir = "<form action='excluir' method='post'>";
            $BtnExcluir .= "<td>";
                $BtnExcluir .= "<input type='text' hidden name='Metodo' value='$met'>";
                $BtnExcluir .= "<input type='text' hidden name='Id' value='$id'>";
                $BtnExcluir .= "<input type='submit' class='btn btn-danger' value='Excluir'>";
            $BtnExcluir .= "</td>";
        $BtnExcluir .= "</form>";
    }else{
        $BtnExcluir = "<td><a class='btn btn-danger disabled'>Excluir</a></td>";
    }
    return $BtnExcluir;
}


?>