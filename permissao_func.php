<?php
// CODIGO DES                                           
session_start();
include ("conexao.php");

// Verifica se está logado
if (!isset($_SESSION['id_funcionario'])) {
    header("Location: controle_dados.php");
    exit;
}

// Verifica se é funcionário
if ($_SESSION['tipo'] != 'funcionario') {
    echo "Acesso negado!";
    exit;
}
?>

<h1>Bem-vindo funcionário!</h1>
<p>Essa página é exclusiva para você.</p>