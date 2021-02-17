<?php
    $usuarios = $_REQUEST['usuarios'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Usuários View</title>
  </head>
  <body>
    <ul>
        <?php foreach ($usuarios as $usuario) { ?>
            <li>
            <?php 
                echo $usuario->getId() . "," . $usuario->getNome() . "," . $usuario->getEmail() . "," .
                $usuario->getSenha()
                ?> 
            </li>
        <?php } ?>
    </ul>
  </body>
</html>