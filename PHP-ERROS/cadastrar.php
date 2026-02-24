<div class="formulario">
    <h2>Cadastrar Produto</h2>

    <?php if (isset($_GET['erro'])) { ?>
        <p style="color:red; font-weight:bold;">
            <?php echo htmlspecialchars($_GET['erro']); ?>
        </p>
    <?php } ?>

    <form action="index.php?page=salvo" method="post">



    
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">

        <label for="quantidade">Quantidade:</label>
       <input type="number" id="quantidade" name="quantidade" required>




        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" min="0">

        <div class="botoes">
            <button type="submit">Salvar</button>
            <a href="index.php?page=home" class="botao botao-cinza">Voltar</a>
        </div>

    </form>
</div>
