<?php
    include("protect.php");
    include("connection.php");

    $sql_code = "SELECT * FROM pacientes";
    $result_query = $mysqli -> query($sql_code) or die("Falha na tentativa de consulta ao Banco de Dados.");

    $qtd_linhas = $result_query -> num_rows;
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
        <button type="button" class="button green mobile cadastrar" id="cadastrarCliente">Cadastrar Paciente</button>
        <button type="button" class="button red apagarTudo" onclick="apagarTudo()">Excluir tudo</button>
        <br><br>
        <table class="records">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>IMC</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($qtd_linhas > 0){
                        $contador=1;
                        while($data = mysqli_fetch_assoc($result_query)){
                            echo "<tr>";
                            echo "<td>".$contador."</td>";
                            echo "<td>".$data['nome']."</td>";
                            echo "<td>".$data['idade']." anos</td>";
                            echo "<td>".$data['peso']." kg</td>";
                            echo "<td>".$data['altura']." cm</td>";
                            echo "<td>".$data['imc']."</td>";
                ?>
                        <td>
                            <button type="button" class="button green">editar</button>
                            <button type="button" class="button red">excluir</button>
                        </td>
                <?php       echo "<tr>";
                            $contador++;
                        }

                    } else {
                        echo "<tr><td colspan='7' align='center' id='tdzero'>Não há registros!</td></tr>";
                    }

                    $mysqli -> close();
                ?>
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