<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    <form action="teste_back.php" method="post">

        <?php if($_SESSION['deubom'] == 'ok'){ ?>
        <p style="color: green; font-size: 10px">SUCESSO</p>
        <?php } ?>

        <?php if($_SESSION['deuruim'] == 'ok'){ ?>
        <p style="color: red; font-size: 10px">FALHOU</p>
        <?php }; ?>

        Nome
        <input type="text" name="nome_paciente" step="0.01"> <br>
        Idade
        <input type="number" name="idade_paciente" step="0.01"> <br>
        Peso
        <input type="number" name="peso_paciente" step="0.01"> <br>
        Altura
        <input type="number" name="alt_paciente" step="0.01"> <br>
        <button>Enviar</button>
    </form>
</body>
</html>