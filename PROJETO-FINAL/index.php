<?php
// inicia a sessão para controlar o login do usuário
session_start();

// carrega o arquivo de conexão com o banco
require_once 'conexao.php';

// pega qual pá o usuário quer acessar
// se não tiver nada, a pág é o login
$pagina = $_GET['page'] ?? 'login';

// verifica se o usuário estalogado
$usuarioLogado = isset($_SESSION['usuarioEstaLogado']);

// se o usuário não esta logado e esta tentando acessar uma pág que não é login ou registro
// manda ele de volta pro login
if (!$usuarioLogado && $pagina != 'login' && $pagina != 'registro') {
    header('Location: index.php?page=login');
    exit;
}

// agora mostra a pág que o usuário pediu
if ($pagina == 'login') {
    include 'login.php';
} 
elseif ($pagina == 'registro') {
    include 'registro.php';
} 
elseif ($pagina == 'home') {
    include 'home.php';
} 
elseif ($pagina == 'cadastrar') {
    include 'cadastrar.php';
} 
elseif ($pagina == 'salvo') {
    include 'salvo.php';
} 
elseif ($pagina == 'editar') {
    include 'editar.php';
} 
elseif ($pagina == 'atualizar') {
    include 'atualizar.php';
} 
elseif ($pagina == 'excluir') {
    include 'excluir.php';
} 
elseif ($pagina == 'logout') {
    include 'logout.php';
} 
else {
    echo "Página não encontrada";
}







