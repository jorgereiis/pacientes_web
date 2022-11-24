<?php
$username = 'root';
$passwd = '';
$database = 'projeto_pacientes';
$host = '127.0.0.1';

$mysqli = new mysqli($host, $username, $passwd, $database);

if ($mysqli -> error){
    die("Falha na conexão ao Bando de Dados: . $mysqli->error");
}
?>