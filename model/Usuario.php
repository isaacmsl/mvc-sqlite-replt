<?php
class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $setOnce = false;

    public function setOnce(?int $id, ?string $nome, ?string $email, ?string $senha): bool {
        if (!$this->setOnce) {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;

            $this->setOnce = true;
            return true;
        }

        return false;
    }
    
    // CRUD
    public function adicionar(): bool {
        $db = new PDO('sqlite:db/usuarios.db');

        // pegar id criado para settar o valor de $this->id
        $adicionou = $db->exec("
          INSERT INTO usuarios (nome, email, senha) VALUES  (\"$this->nome\",\"$this->email\",\"$this->senha\");
        ");

        return $adicionou;
    }

    public function remover(): bool {
      $db = new PDO('sqlite:db/usuarios.db');

      $removeu = $db->exec("
        DELETE FROM usuarios WHERE id = \"$this->id\";
      ");

      return $removeu;
    }

    public function atualizar(): bool {
        $db = new PDO('sqlite:db/usuarios.db');

        $atualizou = $db->exec("
            UPDATE usuarios
            SET 
                nome = \"$this->nome\", 
                email = \"$this->email\",
                senha = \"$this->senha\"
            WHERE id = \"$this->id\";
        ");

        return $atualizou;
    }

    public function listar(): array {
        $db = new PDO('sqlite:db/usuarios.db');

        $usuariosDb = $db->query("SELECT * FROM usuarios")->fetchALL(PDO::FETCH_ASSOC);

        $usuariosResult = [];

        // interpretar como objeto usuario
        foreach($usuariosDb as $usuarioDb) {
            $usuario = new Usuario();
            
            $id = intval($usuarioDb['id']);
            $nome = $usuarioDb['nome'];
            $email = $usuarioDb['email'];
            $senha = $usuarioDb['senha'];

            $usuario->setOnce($id, $nome, $email, $senha);

            array_push($usuariosResult, $usuario);
        }

        return $usuariosResult;
    }

    // getters e setters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha(string $senha) {
        $this->senha = $senha;
    }

} 