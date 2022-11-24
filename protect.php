<?php
    if (!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION["nome"])){
        die("Acesso á página negado. Faça login para prosseguir. <p><a href='index.php'>Entrar</a></p>");
    }
?>