<?php

require_once 'model/Usuario.php';

class UsuarioController {

    // CRUD
    public function adicionar(string $nome, string $email, string $senha): bool {
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        
        return $usuario->adicionar();
    }

    public function remover(int $id): bool {
        $usuario = new Usuario();
        $usuario->setId($id);

        return $usuario->remover();
    }

    public function atualizar(int $id, string $nome, string $email, string $senha): bool {
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

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