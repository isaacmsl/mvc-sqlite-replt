<?php
$db = new PDO('sqlite:../usuarios.db');

echo $db->exec(
"
    CREATE TABLE usuarios(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL, 
        email TEXT NOT NULL, 
        senha TEXT NOT NULL
    );
");