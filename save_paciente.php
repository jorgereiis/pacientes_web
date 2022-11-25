<?php
    // IMPORTANDO A CONEXÃO COM O BD
    include("connection.php");

    // INICIANDO SEÇÃO E VERIFICANDO CREDENCIAIS DE ACESSO
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $mysqli -> real_escape_string($_POST["nome_paciente"]);
        $idade = $mysqli -> real_escape_string($_POST["idade_paciente"]);
        $peso = $mysqli -> real_escape_string($_POST["peso_paciente"]);
        $altura = $mysqli -> real_escape_string($_POST["alt_paciente"]);
        
        $calc_imc = $peso / ($altura * $altura);
        $imc = number_format($calc_imc, 2, '.', '');

        // CADASTRO
        $sql_create = "INSERT INTO pacientes(`nome`, `idade`, `peso`, `altura`, `imc`) VALUES ('$nome', $idade, $peso, $altura, $imc)";

        if ($mysqli -> query($sql_create) === TRUE){
            header("Location: painel.php");
            
        }
    }
    
    $mysqli -> close();
?>
