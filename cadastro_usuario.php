<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nome = $_POST['nome'] ?? "";
$email = $_POST['email'] ?? "";
$senha_input = $_POST["senha"] ??"";
$cidade = $_POST['cidade'] ??'';


$senha = password_hash($senha_input, PASSWORD_DEFAULT);

// 🔐 Insere como usuário comum
$sql = "INSERT INTO login_usuario (nome, email, senha, cidade)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $senha, $cidade);
mysqli_stmt_execute($stmt);

echo "Usuário cadastrado com sucesso!";
}
?> 