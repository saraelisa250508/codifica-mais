<?php
include "conexao.php";

//config erro log
$arquivoLog = "erros.log";
$dataHora = date("d/m/Y H:i:s");


//recebe id pela url
$id = $_GET['id'];


// TRY-CATCH do a2
//banco
try {

// SQL pra deletar produto
    $sql = "DELETE FROM produtos WHERE id=$id";



// executa no banco
    if (!mysqli_query($conexao, $sql)) {
        throw new Exception(mysqli_error($conexao));
    }



// se der tudo certo, volta para a home
    header("Location: index.php?page=home");
    exit;

} catch (Exception $e) {

// registra o erro no log
    file_put_contents(
        $arquivoLog,
        "$dataHora - Erro inesperado ao excluir produto ID $id: " . $e->getMessage() . "\n",
        FILE_APPEND
    );

    echo "<p class='mensagem erro'>Erro inesperado. Tente novamente.</p>";
}
