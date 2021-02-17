<?php
$db = new PDO('sqlite:../usuarios.db');

echo $db->exec(
"
    DROP TABLE usuarios
"
);