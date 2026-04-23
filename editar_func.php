<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM listagem_produtos WHERE id = $id";
$result = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($result);
?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">

    <input type="text" name="nome" value="<?= $produto['nome'] ?>">
    <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>">
    <input type="text" name="saida" value="<?= $produto['saida'] ?>">

    <button type="submit">Salvar Alterações</button>
</form>