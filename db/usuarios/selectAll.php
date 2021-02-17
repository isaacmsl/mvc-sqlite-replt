<?php
$db = new PDO('sqlite:../usuarios.db');

$usuarios = $db->query("SELECT * FROM usuarios")->fetchALL(PDO::FETCH_ASSOC);

print_r($usuarios);
