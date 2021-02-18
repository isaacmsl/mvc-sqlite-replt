<?php

require_once dirname(__FILE__) .  '/../model/Usuario.php';

class UsuarioController {

    // CRUD
    public function adicionar(string $nome, string $email, string $senha): bool {
        $usuario = new Usuario();
        $usuario->setOnce(null, $nome, $email, $senha);
        
        return $usuario->adicionar();
    }

    public function remover(int $id): bool {
        $usuario = new Usuario();
        $usuario->setOnce($id, null, null, null);

        return $usuario->remover();
    }

    public function atualizar(int $id, string $nome, string $email, string $senha): bool {
        $usuario = new Usuario();
        $usuario->setOnce($id, $nome, $email, $senha);

        return $usuario->atualizar();
    }

    public function listar() {
        $usuario = new Usuario();
        $usuarios = $usuario->listar();

        // lança a requisição para o view
        $_REQUEST['usuarios'] = $usuarios;
        require_once 'view/usuario_view.php';
    }

}

?>