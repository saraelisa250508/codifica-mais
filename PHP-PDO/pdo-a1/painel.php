<?php

session_start();
$usuarioEstaLogadoExiste = isset($_SESSION['usuarioEstaLogado']);
if ($usuarioEstaLogadoExiste == false) { //verifica se a sessão existe e se não, redireciona pra página inicial.
    header('Location: index.php');
    exit;
} //fiquei na duvida aq

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="caixa-do-formulario">
  <h1>Painel</h1>
    <p>Olá, <?php echo $_SESSION['nomeDoUsuario']; ?>.</p>
    <p>Você está logado.</p>
    <form action="logout.php" method="post">
        <button type="submit" class="deslogar">Deslogar</button>
    </form>
</div>
</body>
</html>




