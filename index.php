<?php
    // IMPORTANDO A CONEXÃO COM O BD
    include("connection.php");
    session_start();

    $_SESSION["email_existe"] = false;
    $_SESSION["cadastro_realizado"] = false;


    // INICIANDO SEÇÃO E VERIFICANDO CREDENCIAIS DE ACESSO
    $msg_erro = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (isset($_POST["email"]) || isset($_POST["senha"])){

            if (strlen($_POST["email"]) == 0 || strlen($_POST["senha"]) == 0){

                $msg_erro = "Usuário ou senha inválidos.";

            } else {

                // LIMPANDO STRING DAS CREDENCIAIS DE ACESSO PARA EVITAR POSSÍVEIS CÓDIGOS MALICIOSOS
                $email = $mysqli -> real_escape_string($_POST["email"]);
                $senha = $mysqli -> real_escape_string($_POST["senha"]);

                // DEFININDO QUERY SQL E REALIZANDO CONSULTA NO BANCO DE DADOS.
                $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
                $sql_query = $mysqli -> query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                // VERIFICANDO A QUANTIDADE DE LINHAS RETORNADA NA CONSULTA DO BANCO, SE FOR IGUAL A 1, REDIRECIONA PARA A PÁGINA DO PAINEL
                $quantidade = $sql_query->num_rows;
                if ($quantidade == 1){

                    $usuario = $sql_query -> fetch_assoc();

                    if (!isset($_SESSION)){
                        session_start();
                    }

                    $_SESSION["email"] = $usuario["email"];
                    $_SESSION["nome"] = $usuario["nome"];

                    header("Location: painel.php");

                } else {

                    $msg_erro = "Usuário ou senha inválidos.";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sistema hospitalar</title>
</head>
<body>
    <form action="index.php" method="POST">
        <div class="container">
            <div class="card">
                <h1>Gestão de Pacientes</h1>

                <p id="msgError"><?=$msg_erro?></p>

                <div class="label-float">
                    <input type="email" id="user" name="email" placeholder="" required>
                    <label for="user">E-mail</label>
                </div>

                <div class="label-float">
                    <input type="password" id="PasswdLogin" name="senha" placeholder="" required>
                    <label for="PasswdLogin">Senha</label>
                    <i id="verSenhaLogin" class="fa fa-eye" aria-hidden="true"></i>
                </div>

                <div class="justify-center">
                    <button>Entrar</button>
                </div>

                <div class="justify-center">
                    <hr>
                </div>

                <p>
                    Não é cadastrado?
                    <a href="new_user.php">Cadastre-se</a>
                </p>
            </div>
        </div>
    </form>
</body>
</html>

<script src="js/script-login.js"></script>