<?php
    require_once 'controller/UsuarioController.php';

    $usuarioCtrl = new UsuarioController();
    
    $usuarioCtrl->listar();
?>