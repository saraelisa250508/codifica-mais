<?php
// verifica se o usuario digitou algo na pesquisa//muitas duvidas la em baixo
if (isset($_GET['busca']) && $_GET['busca'] != '') { //verifica se existe busca(muito dificill, pesquisar mais)

$busca = $_GET['busca']; //get pega dados digitados

    // busca produto
$sql = "SELECT * FROM produtos
        WHERE nome = '$busca'";
} else {

    //se nao pesquisar mostra tudo
$sql = "SELECT * FROM produtos";
}

// executa busca
$resultado = mysqli_query($conexao, $sql);
?>

<div class="topo-pesquisa">
    <div class="foto-produto">
    <img src="imagens/creme.png">
       <p>Essenciais para realçar sua beleza</p>
    </div>



    <div class="pesquisa">
    <h2>Pesquisar Produto</h2>

    <form method="get" action="index.php">
    <input type="hidden" name="page" value="home">
    <input type="text" name="busca" placeholder="Pesquisar produto">
    <button>Pesquisar</button>
        </form>
    </div>


    
    <div class="foto-produto">
    <img src="imagens/serum.png">
        <p>Tudo para sua rotina de cuidados</p>
    </div>
</div>

<div class="produtos">
<h2>Produtos Cadastrados</h2>

<?php
// verifica se nao tem produtos (pesquisar +)
if (mysqli_num_rows($resultado) == 0) {
    echo '<p class="sem-produtos">Nenhum produto cadastrado.</p>';
} else {
?>

<table>
    <tr>
     <th>Nome</th>
    <th>Quantidade</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>

<?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['quantidade'] ?></td>
        <td>R$ <?= number_format($produto['preco'], 2, ',') ?></td>
        <td>
           


        <a href="index.php?page=editar&id=<?= $produto['id'] ?>">Editar</a> |
        <a href="index.php?page=excluir&id=<?= $produto['id'] ?>"
               onclick="return confirm('Quer excluir esse produto?')">Excluir</a>
        </td>
    </tr>
<?php } ?>

</table>
<?php } ?> 
</div>



