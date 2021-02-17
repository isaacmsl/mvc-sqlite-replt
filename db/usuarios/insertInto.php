<?php
$db = new PDO('sqlite:../usuarios.db');

echo $db->exec(
"
    INSERT INTO usuarios (nome, email, senha) VALUES  (\"Henrique\",\"mnpqn@gmail.com\",123)
"
);