<?php

//config log a2
$arquivoLog = "erros.log";
$dataHora = date("d/m/Y H:i:s");


//dados so
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "estoque_cosmeticos";


//TRY-CATCH do a2, erro inesp.
try {

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    if ($conexao === false) {
        throw new Exception("Falha na conexão com o banco de dados.");
    }
//acentos
    mysqli_set_charset($conexao, "utf8");

} catch (Exception $e) {

//salva erro real no log (boiei aq)
    file_put_contents(
        $arquivoLog,
        "$dataHora - Erro inesperado na conexão: " . $e->getMessage() . "\n",
        FILE_APPEND
    );
    echo "<p class='mensagem erro'>Erro inesperado. Tente novamente.</p>";
    exit;
}
