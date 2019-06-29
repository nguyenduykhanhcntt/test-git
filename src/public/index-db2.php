<?php
require_once 'db2.php';
$pdo = new Pdoo([
    'host' => 'localhost',
    'db_name' => 'banhang',
    'username' => 'root',
    'password' => '',
    'utf' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]
]);
print_r($pdo->connet());

print_r($pdo->fetchone("select * from ban_hang"));