<?php
    // IMPORTANDO A CONEXÃO COM O BD
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $mysqli -> real_escape_string($_POST["email"]);
        $senha = $mysqli -> real_escape_string($_POST["senha"]);
        
        // DEFININDO QUERY SQL E REALIZANDO CONSULTA NO BANCO DE DADOS.
        $sql_consult = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query_consult = $mysqli -> query($sql_consult) or die("Falha na consulta SQL: " . $mysqli->error);
        $quantidade = $sql_query_consult -> num_rows;

        if ($quantidade >= 1){
            echo "Usuário já existe!";
            echo "<br> Linhas: " . $quantidade;

        } else {
            // CADASTRO
            $sql_create = "INSERT INTO usuarios(`nome`, `email`, `senha`) VALUES ('Usuário teste', '$email','$senha')";
            $sql_query_create = $mysqli -> query($sql_create) or die("Falha no cadastro SQL: " . $mysqli->error);
            echo "Cadastro realizado!";
            echo "<br> Linhas: " . $quantidade;
        }
    }
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
    <form action="teste.php" method="post">
        Email:
        <input type="text" name="email" id="email">
        Senha:
        <input type="password" name="senha" id="senha">
        <button>Enviar</button>
    </form>
</body>
</html>