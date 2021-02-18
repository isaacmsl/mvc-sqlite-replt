<?php
    require_once dirname(__FILE__) . "/../controller/UsuarioController.php";
    $usuarioCtrl = new UsuarioController();

    $acao = $_REQUEST['acao'];
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    switch($acao) {
        // /actions/usuario?acao=atualizar
        case "atualizar":
            $usuarioCtrl->$acao($id, $nome, $email, $senha);
            break;
        
        // /actions/usuario?acao=remover
        case "remover":
            $usuarioCtrl->$acao($id);
            break;

        // /actions/usuario?acao=adicionar
        case "adicionar":
            $usuarioCtrl->$acao($nome, $email, $senha);
            break;
    }

    header("Location: ../index.php");
?>