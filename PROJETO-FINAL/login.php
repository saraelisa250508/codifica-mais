<?php
// carrega o arquivo de conexão com o banco
require_once 'conexao.php';

// verifica se o formulário foi enviado (quando o usuário clicou em "Entrar")
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // pega o email e senha que o usuário digitou
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // conecta no banco de dados
    $conexao = criarConexaoComBancoDeDados();

    // busca o usuário no banco pelo email
    $sql = $conexao->prepare(
        "SELECT * FROM usuarios WHERE email = :email"
    );
    $sql->bindValue(':email', $email);
    $sql->execute();

    // pega os dados do usuário (se existir)
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    // verifica se encontrou o usuário e se a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // se deu tudo certo, marca que o usuário está logado na sessão
        $_SESSION['usuarioEstaLogado'] = true;
        $_SESSION['usuarioId'] = $usuario['id'];

        // manda o usuário pra página inicial do sistema
        header('Location: index.php?page=home');
        exit;
    } else {
        // se não encontrou ou a senha está errada, mostra erro
        $erro = "E-mail ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style-login.css">
</head>
<body class="login">

<div class="caixa-do-formulario">
<h1>Login</h1>

<?php if (isset($erro)) { ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php } ?>

<form method="post">
<label>E-mail</label>
<input type="email" name="email" required>

<label>Senha</label>
<input type="password" name="senha" required>

<button type="submit" class="botao-entrar">Entrar</button>
</form>

<a href="index.php?page=registro">Criar conta</a>
</div>

</body>
</html>

