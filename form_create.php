<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar novo usuário</title>
    <link rel="stylesheet" href="./css/style-create-user.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Criar Conta</h1>

            <form action="create_validation.php" method="POST">
                <?php if($_SESSION["email_existe"]): ?>
                    <div id="msgError">E-mail informado já cadastrado. <br> Faça login <a id="link_msgError" href="index.php">aqui!</a></div>
                <?php endif; $_SESSION["email_existe"]=''; ?>

                <?php if($_SESSION["cadastro_realizado"]): ?>
                    <div id="msgSuccess">Cadastro realizado com sucesso!</div>
                <?php endif; $_SESSION["cadastro_realizado"]=''; ?>
                
                <div class="label-float">
                    <input type="text" id="nome" name="nome" placeholder="" minlength="8" required>
                    <label id="labelNome" for="nome">Nome</label>
                </div>

                <div class="label-float">
                    <input type="email" id="email" name="email" placeholder="" required>
                    <label id="labelEmail" for="email">E-mail</label>
                </div>

                <div class="label-float">
                    <input type="password" id="passwd" name="passwd" placeholder="" minlength="8" required>
                    <label id="LabelPasswd" for="passwd">Senha</label>
                    <i id="verSenha" class="fa fa-eye" aria-hidden="true"></i>
                </div>

                <div class="label-float">
                    <input type="password" id="confirmPasswd" name="confirmPasswd" placeholder="" minlength="8" required>
                    <label id="LabelConfirmSenha" for="confirmPasswd">Confirmar senha</label>
                    <i id="verConfirmSenha" class="fa fa-eye" aria-hidden="true"></i>
                </div>

                <div class="justify-center">
                    <button id="btn_cad">Cadastrar</button>
                </div>
            </form>

            <div class="justify-center">
                <hr>
            </div>

            <p>
                Já possui uma conta? 
                <a href="index.php">Entrar</a>
            </p>
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="js/script-create.js"></script>