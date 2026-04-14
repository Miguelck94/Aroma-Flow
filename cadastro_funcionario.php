<?php
session_start();
include("conexao.php");

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";

$sql = "SELECT * FROM funcionario WHERE email='$email' AND senha='$senha'";
$result = mysqli_query($conexao, $sql);

if ($user = mysqli_fetch_assoc($result)) {
    $_SESSION['id_funcionario'] = $user['id'];
    $_SESSION['nome'] = $user['nome'];

    header("Location: controle_dados.php");
} else {
    echo "Login com sucesso";
}
