<?php

function retornaCampo($campo, $req){
    switch ($campo) {
        case 'status':
            $input = "<label for='status' class='form-label'>Status</label>";
            $input .= "<select class='form-select mb-3' name='status' id='status'>";
                if($req != null and $req->status == 'ativo'){
                    $input .= "<option selected value='ativo'>Manter Ativo</option>";
                    $input .= "<option value='inativo'>Bloquear</option>";
                }else{
                    $input .= "<option value='ativo'>Ativar</option>";
                    $input .= "<option selected value='inativo'>Manter Bloqueado</option>";
                }
            $input .= "</select>";
            return $input;
        break;

        case 'titulo':
            $input = "<label for='titulo' class='form-label'>Título</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='titulo' name='titulo' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='titulo' name='titulo' value='$req->titulo'>";
            }
            return $input;
        break;
        
        case 'link':
            $input = "<label for='link' class='form-label'>Link</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='link' name='link' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='link' name='link' value='$req->link'>";
            }
            return $input;
        break;
        
        case 'referencia':
            $input = "<label for='ref' class='form-label'>Referência</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='ref' name='ref' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='ref' name='ref' value='$req->ref'>";
            }
            return $input;
        break;
        case 'linkS':
            $input = "<label for='link' class='form-label'>Link</label>";
            $input .= "<select class='form-select mb-3' name='link' id='link'>";
                $Options = DB::getTodos("conteudos", array('where'=>array('status'=>'ativo'),'order_by'=>'id ASC'));
                foreach($Options['res'] as $option){
                    $input .= "<option value='$option->id'>$option->titulo</option>";
                }
            $input .= "</select>";
            return $input;
        break;
        
        case 'linkd':
            $input = "<label for='link' class='form-label'>Link</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='link' name='link' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='link' name='link' value='$req->link' disabled>";
            }
            return $input;
        break;
        
        case 'conteudo':
            $input = "<label for='conteudo' class='form-label'>Conteúdo</label>";
            if($req == null){
                $input .= "<textarea class='form-control' name='conteudo' id='conteudo'></textarea>";
            }else{
                $input .= "<textarea class='form-control' name='conteudo' id='conteudo'>$req->conteudo</textarea>";
            }
            $input .= "<script> tinymce.init({ selector: '#conteudo', plugins: 'link codesample fullscreen image lists media quickbars searchreplace table wordcount', language: 'pt_BR', quickbars_insert_toolbar: false, menubar: false, paste_block_drop: true, toolbar: 'fullscreen | blocks | bold italic underline | numlist bullist', block_formats: 'Parágrafo=p; Título=h2; Subtítulo=h4;', }); </script>";
            return $input;
        break;
        
        case 'conteudoImage':
            $input = "<label for='conteudo' class='form-label'>Conteúdo</label>";
            if($req == null){
                $input .= "<textarea class='form-control' name='conteudo' id='conteudo'></textarea>";
            }else{
                $input .= "<textarea class='form-control' name='conteudo' id='conteudo'>$req->conteudo</textarea>";
            }
            $input .= "<script> tinymce.init({ selector: '#conteudo', plugins: 'link codesample fullscreen image lists media quickbars searchreplace table wordcount', language: 'pt_BR', quickbars_insert_toolbar: false, menubar: false, paste_block_drop: true, toolbar: 'fullscreen | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | numlist bullist | link image | table', block_formats: 'Parágrafo=p; Título=h2; Subtítulo=h4;', file_picker_types: 'image', automatic_uploads: true, images_upload_url: 'insert-image', }); </script>";
            return $input;
        break;

        case 'nome':
            $input = "<label for='nome' class='form-label'>Nome</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='nome' name='nome' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='nome' name='nome' value='$req->nome'>";
            }
            return $input;
        break;
        
        case 'email':
            $input = "<label for='email' class='form-label'>E-mail</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='email' name='email' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='email' name='email' value='$req->email'>";
            }
            return $input;
        break;
        
        case 'depto':
            $input = "<label for='depto' class='form-label'>Departamento</label>";
            if($req == null){
                $input .= "<input class='form-control mb-3' type='text' id='depto' name='depto' value=''>";
            }else{
                $input .= "<input class='form-control mb-3' type='text' id='depto' name='depto' value='$req->depto'>";
            }
            return $input;
        break;
        
        case 'perm':
            $input = "<label for='perm' class='form-label'>Permissão</label>";
            $input .= "<select class='form-select mb-3' name='perm' id='perm'>";
                $input .= "<option value='0'>0 - Super Administrador</option>";
                $input .= "<option value='1'>1 - Administrador</option>";
            $input .= "</select>";
            return $input;
        break;

        case 'pass':
            $input = "<label for='pass' class='form-label'>Senha</label>";
            $input .= "<input class='form-control mb-3' type='password' id='pass' name='pass' value=''>";
            return $input;
        break;
    }
}

?>