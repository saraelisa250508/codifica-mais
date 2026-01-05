<?php
require 'vendor/autoload.php'; ///la em baixo.. href é endereço e a é link.. nao esquecer
require 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailDigitado = $_POST['email'];
    $senhaDigitada = $_POST['senha']; //guarda os dados do formulário
    $conexaoComBanco = criarConexaoComBancoDeDados();
    $consultaLogin = $conexaoComBanco->prepare(
        "SELECT * FROM usuarios WHERE email = :email" //busca dados no banco
    );
    $consultaLogin->bindValue(':email', $emailDigitado);
    $consultaLogin->execute();
    $dadosDoUsuario = $consultaLogin->fetch();//fetch é buscar
    if ($dadosDoUsuario && password_verify($senhaDigitada, $dadosDoUsuario['senha'])) {

        $_SESSION['usuarioEstaLogado'] = true;
        $_SESSION['nomeDoUsuario'] = $dadosDoUsuario['nome'];

        header('Location: painel.php');
        exit;
    } else {
        $mensagemDeErro = "E-mail ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="caixa-do-formulario">
<h1>Login</h1>

    <?php if (isset($mensagemDeErro)) { ?>
    <p style="color: red;"><?php echo $mensagemDeErro; ?></p>
    <?php } ?>

    <form method="post">
    <label>E-mail</label>
    <input type="email" name="email" required>

        <label>Senha</label>
        <input type="password" name="senha" required>
        <button type="submit" class="botao-entrar">Entrar</button> 
    </form>
    <a href="registro.php">Criar conta</a> 
</div>

</body>
</html>
