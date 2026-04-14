<?php
include("conexao.php");

$id = $_GET["id"] ?? ""; // pode vir pela URL

$sql = "DELETE FROM listagem_produtos WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    echo "Produto excluído com sucesso!";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>