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
        $sql_query_consult = $mysqli -> query($sql_consult) or die("Falha na consulta ao Banco de Dados.");
        $quantidade = $sql_query_consult -> num_rows;

        // CASO EXISTA USUARIO COM O EMAIL PASSADO NO FORMULÁRIO, DEFINE TRUE NA VARIAVEL DE SESSÃO E SAI DA CONEXÃO COM O BANCO DE DADOS.
        if ($quantidade >= 1){
            $_SESSION["email_existe"] = true;
            header("Location: new_user.php");
            exit;
        }

        // CADASTRO
        $sql_create = "INSERT INTO usuarios(`nome`, `email`, `senha`) VALUES ('$nome', '$email','$senha')";

        if ($mysqli -> query($sql_create) === TRUE){
            $_SESSION["cadastro_realizado"] = true;
            header("Location: new_user.php");
            
        }
    }
    
    $mysqli -> close();
?>

