<?php
    $usuarios = $_REQUEST['usuarios'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Usuários View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/styles/usuarioView.css"/>
    <script src="/view/scripts/usuarioView.js" defer></script>
  </head>
  <body>
    <main>
        <form action="/actions/usuario.php?acao=adicionar" method="POST">
            <div>
                <img src="/assets/user.svg" alt="Nome"/>
                <label for="nomeInput" hidden>Nome</label>
                <input
                    id="nomeInput"
                    type="text"
                    name="nome"
                    placeholder="Nome"
                    required
                />
            </div>
            <div>
                <img src="/assets/mail.svg" alt="Email"/>
                <label for="emailInput" hidden>Email</label>
                <input
                    id="emailInput"
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                />
            </div>
            <div>
                <img src="/assets/key.svg" alt="Senha"/>
                <label for="senhaInput" hidden>Senha</label>
                <input
                    id="senhaInput"
                    type="password"
                    name="senha"
                    placeholder="Senha"
                    required
                />
            </div>
            <div>
                <label for="adicionarBtn" hidden>Adicionar</label>
                <button
                    id="adicionarBtn"
                    type="submit"
                >
                    <img src="/assets/plus.svg" alt="Mais"/>
                    Add
                </button>
            </div>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th></th>
            </tr>
            <?php foreach ($usuarios as $index => $usuario) { ?>
                <tr>
                    <?php
                        $id = $usuario->getId(); 
                        $nome = $usuario->getNome(); 
                        $email = $usuario->getEmail(); 
                        $senha = $usuario->getSenha();
                    ?>
                    <td><?=$id?></td> 
                    <td><?=$nome?></td>
                    <td><?=$email?></td>
                    <td><?=$senha?></td>
                    <td>
                        <a 
                            title="Remover"
                            href="/actions/usuario.php?acao=remover&id=<?=$id?>"
                        >
                            <img
                                src="/assets/trash.svg" 
                                alt="Remover"
                            />
                        </a>
                        <button 
                            title="Alterar"
                            onClick="alterarLinha(<?=$index?>)"
                        >
                            <img
                                src="/assets/edit.svg" 
                                alt="Alterar"
                            />
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <ul>
        
    </ul>
  </body>
</html>