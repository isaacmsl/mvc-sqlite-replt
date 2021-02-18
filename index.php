<?php
    require_once dirname(__FILE__) . "/controller/UsuarioController.php";

    $usuarioCtrl = new UsuarioController();
    
    $usuarioCtrl->listar();
?>