<?php
require_once __DIR__ . ('/template/navbar.php');
require_once __DIR__ . ('/../routes/rotas.php');
?>

<body class="gerarRelatorio">
    <div class="relatorio-dashboard">
        <div class="relatorio-card">
            <h1 class="relatorio-titulo"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</h1>

            <form action="" method="GET" class="form-pesquisa">
                <div class="grupo-campos">
                    <!-- <input type="search" name="buscar" placeholder="Buscar visitante..." class="campo-texto" /> -->

                    <input type="date" name="data" class="campo-data" />

                    <button type="submit" class="botao-pesquisa">
                        <i class="fa fa-search"></i> Pesquisar
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>