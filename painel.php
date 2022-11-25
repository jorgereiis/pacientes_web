<?php
    include("protect.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-painel.css">
    <title>Painel do sistema</title>
</head>
<body>
    <header>
        <h1 class="header-title">Cadastro de Pacientes</h1>
        <a href="logout.php" class="logout cor">X</a>
    </header>
    <main>
        <button type="button" class="button green mobile" id="cadastrarCliente">Cadastrar Paciente</button>
        <table class="records">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>IMC</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jorge Reis</td>
                    <td>32 anos</td>
                    <td>81.10 kg</td>
                    <td>1.74 cm</td>
                    <td>26.30</td>
                    <td>
                        <button type="button" class="button green">editar</button>
                        <button type="button" class="button red">excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="modal" id="modal">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Novo Paciente</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form action="save_paciente.php" method="post">
                    <div class="modal-form">
                        <input type="text" class="modal-field" placeholder="Nome do Paciente" name="nome_paciente" step="0.01" required>
                        <input type="number" class="modal-field" placeholder="Idade" name="idade_paciente" step="0.01" required>
                        <input type="number" class="modal-field" placeholder="Peso" name="peso_paciente" step="0.01" required>
                        <input type="number" class="modal-field" placeholder="Altura" name="alt_paciente" step="0.01" required>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="button green">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        Copyright &copy; Jorge Reis Galvão
    </footer>
</body>
</html>
<script src="js/script-painel.js" defer></script>