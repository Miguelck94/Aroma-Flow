<?php
include("conexao.php");

$nome = $_POST["nome"] ?? "";
$quantidade = $_POST["quantidade"] ?? "";
$saida = $_POST["saida"] ?? "";

$sql = "INSERT INTO listagem_produtos (nome, quantidade, saida) 
        VALUES ('$nome', '$quantidade', '$saida')";

if (mysqli_query($conexao, $sql)) {
    echo "Produto editado!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>