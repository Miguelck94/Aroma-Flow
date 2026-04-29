<?php
include("conexao.php");

$busca = $_GET['busca'] ?? '';

// QUERY CORRETA (agora com ID)
if (!empty($busca)) {
    $stmt = $conexao->prepare("
        SELECT id, nome, preco, img
        FROM produtos 
        WHERE LOWER(nome) LIKE LOWER(?)
    ");

    $busca_param = "%" . $busca . "%";
    $stmt->bind_param("s", $busca_param);

} else {
    $stmt = $conexao->prepare("
        SELECT id, nome, preco, img
        FROM produtos
    ");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<?php
if ($result->num_rows > 0) {
    while ($produto = $result->fetch_assoc()) {
?>
        <a href="produto.php?id=<?= $produto['id'] ?>" style="text-decoration:none;">
            <div>
                <img src="<?= $produto['img'] ?>" alt="<?= $produto['nome'] ?>">
                <h3><?= $produto['nome'] ?></h3>
                <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            </div>
        </a>
<?php
    }
} else {
    echo "Produto não encontrado.";
}
?>