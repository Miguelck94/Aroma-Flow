<?php
include("conexao.php");

// Consulta ao banco
$sql = "SELECT * FROM listagem_produtos";
$result = mysqli_query($conexao, $sql);

// Verifica se retornou dados
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Nome: " . $row['nome'] . "<br>";
        echo "Quantidade: " . $row['quantidade'] . "<br>";
        echo "Saída: " . $row['saida'] . "<br><br>";
    }

} else {
    echo "Nenhum produto encontrado.";
}
?>