<?php
    // IMPORTANDO A CONEXÃO COM O BD
    include("connection.php");
    session_start();

    $_SESSION["email_existe"] = "";
    $_SESSION["cadastro_realizado"] = "";

    // INICIANDO SEÇÃO E VERIFICANDO CREDENCIAIS DE ACESSO
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $mysqli -> real_escape_string($_POST["nome"]);
        $email = $mysqli -> real_escape_string($_POST["email"]);
        $senha = $mysqli -> real_escape_string($_POST["passwd"]);
        
        // DEFININDO QUERY SQL E REALIZANDO CONSULTA NO BANCO DE DADOS.
        $sql_consult = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query_consult = $mysqli -> query($sql_consult) or die("Falha na consulta SQL: " . $mysqli->error);
        $quantidade = $sql_query_consult -> num_rows;

        if ($quantidade >= 1){
            $_SESSION["email_existe"] = true;

        }

        // CADASTRO
        $sql_create = "INSERT INTO usuarios(`nome`, `email`, `senha`) VALUES ('$nome', '$email','$senha')";

        if ($mysqli -> query($sql_create) === TRUE){
            $_SESSION["cadastro_realizado"] = true;
            
        }
    }

    $mysqli -> close();
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

            <form action="create-account.php" method="POST">
                <?php if($_SESSION["email_existe"]):?>
                    <div id="msgError"></div>
                <?php endif ?>
                <?php if($_SESSION["cadastro_realizado"]): ?>
                    <div id="msgSuccess"></div>
                <?php endif ?>
                
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
                    <button onclick="cadastrar()" >Cadastrar</button>
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