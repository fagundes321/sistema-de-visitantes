<?php
// navbar
require_once __DIR__ . ('/template/navbar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visitantes</title>
    <!-- Link do seu CSS, se houver -->
</head>
<body class="visitantes">

    <div class="div-mae">
        <!-- Formulário de Registro -->
        <!-- <form class="formRegistro" action="registrar_visitante.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome do visitante" required>
            <input type="submit" value="Registrar" class="botao-registrar">
        </form> -->

        <!-- Botão de Relatório -->
        <!-- <form action="gerar_relatorio.php" method="POST" style="margin-top: 10px;">
            <button type="submit" class="botao-relatorio">Gerar Relatório</button>
        </form> -->

        <!-- Tabela de Visitantes -->
        <div class="container-dashboard">
    <h2 class="titulo-pagina">📋 Lista de Visitantes</h2>

    <div class="botoes-acao">
        <form action="registrar_visitante.php" method="GET">
            <button type="submit" class="botao-registrar">➕ Registrar Visitante</button>
        </form>

        <form action="gerar_relatorio.php" method="POST">
            <button type="submit" class="botao-relatorio">📄 Gerar Relatório</button>
        </form>
    </div>

    <div class="card-tabela">
        <table class="tabela-visitantes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RG</th>
                    <th>Visitante</th>
                    <th>Destino</th>
                    <th>Responsável</th>
                    <th>Hora Entrada</th>
                    <th>Hora Saída</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>55555</td>
                    <td>João Silva</td>
                    <td>Ajudância</td>
                    <td>Cirilo</td>
                    <td>10:32</td>
                    <td>15:10</td>
                    <td>2025-06-18</td>
                </tr>
                <!-- outros visitantes... -->
            </tbody>
        </table>
    </div>
</div>
    </div>

<?php
// footer
require_once __DIR__ . ('/template/footer.php');
?>

</body>
</html>
