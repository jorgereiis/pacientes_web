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

        <?php if($_SESSION['cad_success'] == 'ok'){ ?>
        <p style="color: green; font-size: 10px">SUCESSO</p>
        <?php } else { echo $_SESSION['cad_success'];}; ?>

        <?php if($_SESSION['cad_fail'] == 'ok'){ ?>
        <p style="color: red; font-size: 10px">FALHOU</p>
        <?php }; ?>

        Email:
        <input type="text" name="email" id="email">
        Senha:
        <input type="password" name="senha" id="senha">
        <button>Enviar</button>
    </form>
</body>
</html>