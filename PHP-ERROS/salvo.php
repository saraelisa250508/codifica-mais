<?php
include "conexao.php";


//recebe os dados do form
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];


//config log
$arquivoLog = "erros.log";
$dataHora = date("d/m/Y H:i:s");


//erro de ngc a1
// validação: nome vazio
if (trim($nome) == "") {

    file_put_contents(
        $arquivoLog,
        "$dataHora - Nome vazio. Erro ao cadastrar produto.\n",
        FILE_APPEND
    );

    echo "<p class='mensagem erro'>O nome do produto não pode ser vazio.</p>";
    exit;
}


// validacao da quantidade negativa
if (is_numeric($quantidade) == false || $quantidade < 0) {

    file_put_contents(
        $arquivoLog,
        "$dataHora - Quantidade $quantidade inválida. Erro ao cadastrar produto.\n",
        FILE_APPEND
    );

    echo "<p class='mensagem erro'>A quantidade não pode ser negativa.</p>";
    exit;
}


// validacao preço menor ou zero
if (is_numeric($preco) == false || $preco <= 0) {

    file_put_contents(
        $arquivoLog,
        "$dataHora - Preço $preco inválido. Erro ao cadastrar produto.\n",
        FILE_APPEND
    );

    echo "<p class='mensagem erro'>O preço deve ser maior que zero.</p>";
    exit;
}




//TRY-CATCH a2
//parte do banco

try {

//comando sql pra inserir produto
    $sql = "INSERT INTO produtos (nome, quantidade, preco)
            VALUES ('$nome', $quantidade, $preco)";




    // execução no banco
   if (mysqli_query($conexao, $sql) == false) {
    throw new Exception(mysqli_error($conexao));
}




//redireciona para a home se der certo
    header("Location: index.php?page=home");
    exit;




} catch (Exception $e) {

//registra erro no log 
    file_put_contents(
        $arquivoLog,
        "$dataHora - Erro inesperado ao cadastrar: " . $e->getMessage() . "\n",
        FILE_APPEND
    );
    echo "<p class='mensagem erro'>Erro inesperado. Tente novamente.</p>";
}




