<?php

$username = 'root';
$passwd = '1234';
$database = 'projeto_pacientes';
$host = '127.0.0.1';

$mysqli = new mysqli($host, $username, $passwd, $database);

if ($mysqli -> error){
    die("Falha na conexão ao Bando de Dados. Verifique as variáveis de conexão!");
}
?>