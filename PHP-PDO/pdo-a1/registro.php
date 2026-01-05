<?php
require 'vendor/autoload.php';
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nomeDigitado = $_POST['nome']; //pra guuardar os dados
    $emailDigitado = $_POST['email'];
   $senhaDigitada = $_POST['senha'];
    $confirmarSenhaDigitada = $_POST['confirmar_senha'];
$emailEhValido = filter_var($emailDigitado, FILTER_VALIDATE_EMAIL); //la em baixo, n esquecer de ajeitar dps

if ($emailEhValido == false) {
    $mensagemDeErro = "E-mail inválido.";
} elseif ($senhaDigitada !== $confirmarSenhaDigitada) {
    $mensagemDeErro = "As senhas não conferem.";
} else {
        $senhaCriptografada = password_hash($senhaDigitada, PASSWORD_DEFAULT); //pra usar acentos e caracteres (vi no doc.)
        $conexaoComBanco = criarConexaoComBancoDeDados();
        $consultaRegistro = $conexaoComBanco->prepare(
            "INSERT INTO usuarios (nome, email, senha)
             VALUES (:nome, :email, :senha)"
        );
        $consultaRegistro->bindValue(':nome', $nomeDigitado);
        $consultaRegistro->bindValue(':email', $emailDigitado);
        $consultaRegistro->bindValue(':senha', $senhaCriptografada);
        $consultaRegistro->execute();

        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
 <html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="caixa-do-formulario">
<h1>Registro</h1>

<?php if (isset($mensagemDeErro)) { ?>
        <p style="color: red;"><?php echo $mensagemDeErro; ?></p>
<?php } ?>

    <form method="post">
        <label>Nome</label>
        <input type="text" name="nome" required>

        <label>E-mail</label>
     <input type="email" name="email" required>

        <label>Senha</label>
       <input type="password" name="senha" required> 
        <label>Confirmar senha</label>
       <input type="password" name="confirmar_senha" required>
        <button type="submit" class="botao-entrar">Criar conta</button> 
    </form>
    <a href="index.php">Cancelar</a>
</div>
</body>
</html>



