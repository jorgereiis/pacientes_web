<?php
    // IMPORTANDO A CONEXÃO COM O BD
    include("connection.php");
    session_start();
    $_SESSION['cad_fail'] = 'bola';
    $_SESSION['cad_success'] = 'nada';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $mysqli -> real_escape_string($_POST["email"]);
        $senha = $mysqli -> real_escape_string($_POST["senha"]);
        
        // DEFININDO QUERY SQL E REALIZANDO CONSULTA NO BANCO DE DADOS.
        $sql_consult = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query_consult = $mysqli -> query($sql_consult) or die("Falha na consulta SQL: " . $mysqli->error);
        $quantidade = $sql_query_consult -> num_rows;

        if ($quantidade >= 1){
            $_SESSION['cad_fail'] = 'ok';
            header("Location: teste_cad.php");

        } else {
            // CADASTRO
            $sql_create = "INSERT INTO usuarios(`nome`, `email`, `senha`) VALUES ('Usuário teste', '$email','$senha')";
            $sql_query_create = $mysqli -> query($sql_create) or die("Falha no cadastro SQL: " . $mysqli->error);
            $_SESSION['cad_success'] = 'ok';
            header("Location: teste_cad.php");
        }
    }
?>