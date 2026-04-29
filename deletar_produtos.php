<?php
include 'conexao.php';
session_start();

$id_login_usuario = $_SESSION['id'] ?? 0;

if (isset($_GET['id'])) {
    $id_produto = (int) $_GET['id'];

    // 1. Diminuir a quantidade
    $stmt = $conexao->prepare("
        UPDATE carrinho 
        SET quantidade = quantidade - 1 
        WHERE id_produto = ? AND id_login_usuario = ?
    ");
    $stmt->bind_param("ii", $id_produto, $id_login_usuario);
    $stmt->execute();

    // 2. Excluir se quantidade for 0 ou menor
    $stmt = $conexao->prepare("
        DELETE FROM carrinho 
        WHERE id_produto = ? AND id_login_usuario = ? AND quantidade <= 0
    ");
    $stmt->bind_param("ii", $id_produto, $id_login_usuario);
    $stmt->execute();

    header("Location: carrinho.php");
    exit();
}
?>