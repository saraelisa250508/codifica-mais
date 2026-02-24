<?php
include "conexao.php";




//recebe dados do form
$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];



//config do log
$arquivoLog = "erros.log";
$dataHora = date("d/m/Y H:i:s");



//erro a1- VALIDACAO
//nome vazio
if (trim($nome) == "") {

    file_put_contents(
     $arquivoLog,
    "$dataHora - Nome vazio. Erro ao editar produto ID $id.\n",
        FILE_APPEND
    );
    echo "<p class='mensagem erro'>O nome do produto não pode ser vazio.</p>";
    exit;
}





//validacao quantidade negativa
if (is_numeric($quantidade) == false || $quantidade < 0) {

    file_put_contents(
        $arquivoLog,
        "$dataHora - Quantidade $quantidade inválida. Erro ao editar produto ID $id.\n",
        FILE_APPEND
    );

    echo "<p class='mensagem erro'>A quantidade não pode ser negativa.</p>";
    exit;
}






// validacao preço menor ou zero
if (is_numeric($preco) == false || $preco <= 0) {
    file_put_contents(
        $arquivoLog,
        "$dataHora - Preço $preco inválido. Erro ao editar produto ID $id.\n",
        FILE_APPEND
    );
    echo "<p class='mensagem erro'>O preço deve ser maior que zero.</p>";
    exit;
}


//TRY-CATCH a2 (duvida aq)
//banco
try {

//atualiza produto no banco
    $sql = "UPDATE produtos 
            SET nome='$nome', quantidade=$quantidade, preco=$preco 
            WHERE id=$id";

    if (!mysqli_query($conexao, $sql)) {
        throw new Exception(mysqli_error($conexao));
    }





//volta pra home
    header("Location: index.php?page=home");
    exit;
} catch (Exception $e) {




//salva erro no log
    file_put_contents(
        $arquivoLog,
        "$dataHora - Erro inesperado ao editar produto: " . $e->getMessage() . "\n",
        FILE_APPEND
    );
    echo "<p class='mensagem erro'>Erro inesperado. Tente novamente.</p>";
}


