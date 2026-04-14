<?php
include("conexao.php");

$id = $_POST["id"] ?? "";
$nome = $_POST["nome"] ?? "";
$quantidade = $_POST["quantidade"] ?? "";
$saida = $_POST["saida"] ?? "";

$sql = "UPDATE listagem_produtos 
        SET nome='$nome', quantidade='$quantidade', saida='$saida'
        WHERE id='$id'";

if (mysqli_query($conexao, $sql)) {
    echo "Produto atualizado com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>