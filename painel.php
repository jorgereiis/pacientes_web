<?php
    include("protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do sistema</title>
</head>
<body>
    <h1>Painel</h1>
    <p>Seja bem-vindo, <?= $_SESSION["nome"]; ?></p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>