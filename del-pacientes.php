<?php
    // IMPORTANDO A CONEXÃO COM O BD
    include("connection.php");
    include("protect.php");

    // CADASTRO
    $sql_delete = "DELETE FROM pacientes";

    if ($mysqli -> query($sql_delete) === TRUE){
        header("Location: painel.php");
        
    }
    
    $mysqli -> close();
?>