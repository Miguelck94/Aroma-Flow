<?php
//Botão que adiciona ao carrinho do usuario
session_start();
include("conexao.php");


if(!isset($_SESSION['id_login_usuario'])){ //ver no banco de dados do miguel
    header("Location: login.php");
    exit;
}


$id_login_usuario= $_SESSION['id_login_usuario'];
$id_produto = $_POST['id_produto'];


$sql = "INSERT INTO carrinho (id_login_usuario, id_produto, quantidade)
        VALUES ($id_login_usuario, $id_produto, 1)"; //ver no bando de dados do miguel


mysqli_query($conn, $sql);


header("Location: carrinho.php");
?>
