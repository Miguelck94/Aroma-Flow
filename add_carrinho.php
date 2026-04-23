<?php
//Botão que adiciona ao carrinho do usuario
session_start();
include("conexao.php");


if(!isset($_SESSION['id'])){ //ver no banco de dados do miguel
    header("Location: ./carrinho.php");
    exit;
}


$id_login_usuario= $_SESSION['id'];
$id_produto = $_POST['id_produto'];

$stmt = mysqli_prepare($conexao, "
    INSERT INTO carrinho (id_login_usuario, id_produto, quantidade)
    VALUES (?, ?, 1)
    ON DUPLICATE KEY UPDATE quantidade = quantidade + 1
");


mysqli_stmt_bind_param($stmt, "ii", $id_login_usuario, $id_produto);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


header("Location: ./carrinho.php");
?>
