<style>
    /* Faz o body ser flex container em coluna e ocupar a tela inteira */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    /* Conteúdo principal cresce para ocupar o espaço disponível */
    .aa {
        display: flex;
        flex: 1;
        padding: 20px;
    }

    /* Rodapé fixo ao final sem aumentar a página */
    footer {
        background: #fff;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top: 1px solid #ddd;
        font-size: 14px;
        color: rgb(102, 102, 102);
    }

    footer p {
        margin: 0;
    }
</style>

<div class="aa">
</div>

<footer>
    <p>&copy; 2025 Todos os direitos reservados.</p>
</footer>
</body>

</html>