<?php
// carrega o arquivo de conexão com o banco
require_once 'conexao.php';

// verifica se o formulário foi enviado (quando o usuário clicou em "Criar conta")
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // pega os dados que o usuário digitou no formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    // verifica se o email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagemDeErro = "E-mail inválido.";
    } 
    // verifica se as duas senhas são iguais
    elseif ($senha !== $confirmarSenha) {
        $mensagemDeErro = "As senhas não conferem.";
    } 
    // se passou nas verificações, tenta cadastrar o usuário
    else {

        // conecta no banco de dados
        $conexao = criarConexaoComBancoDeDados();

        // criptografa a senha (nunca guarda senha sem criptografar!)
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // prepara o comando SQL para inserir o novo usuário
        $sql = $conexao->prepare(
            "INSERT INTO usuarios (nome, email, senha)
             VALUES (:nome, :email, :senha)"
        );

        // coloca os valores no comando SQL
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senhaCriptografada);

        // tenta executar o cadastro
        try {
            $sql->execute();
            // se deu certo, manda o usuário pro login
            header('Location: index.php?page=login');
            exit;
        } 
        // se deu erro (por exemplo, email já existe)
        catch (PDOException $e) {
            // erro 23000 = email duplicado
            if ($e->getCode() == 23000) {
                $mensagemDeErro = "Esse e-mail já está cadastrado.";
            } else {
                $mensagemDeErro = "Erro ao cadastrar usuário.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style-login.css">
</head>
<body class="login">

<div class="caixa-do-formulario">
<h1>Registro</h1>

<?php if (isset($mensagemDeErro)) { ?>
    <p style="color: red;"><?= $mensagemDeErro ?></p>
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

    <button type="submit">Criar conta</button>
</form>

<a href="index.php?page=login">Voltar</a>
</div>

</body>
</html>




