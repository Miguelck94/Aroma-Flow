<?php
//esse é o carrino na qual vai está listados os itens na qualas pessoas vão adicionar no seu Carrinho
//cada um tem um carrinho isso vai depender do login de cadastro
session_start();
include("conexao.php");





$usuario_id = $_SESSION['login_usuario'] ?? 0;

$sql = "SELECT produtos.nome, produtos.preco
        FROM carrinho
        JOIN produtos ON carrinho.id_produto = produtos.id  
        WHERE carrinho.id_login_usuario = $usuario_id";

            
$result = mysqli_query($conexao, $sql); //sabe que é o carrinho de tal pessoa por causa de seu id na qual vamos olhar no codigo do miguel em my sql

$sqlTotal = "SELECT SUM(produtos.preco) AS total
             FROM carrinho
             JOIN produtos ON carrinho.id_produto = produtos.id  
             WHERE carrinho.id_login_usuario = $usuario_id";

$resultTotal = mysqli_query($conexao, $sqlTotal);
$total = mysqli_fetch_assoc($resultTotal)['total'] ?? 0;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrinho</title>
    <link rel="stylesheet" href="./add_carrinho.php">
</head>
<body></body>

<h2>Seu Carrinho</h2> <!--pesquisar como deixar o carrinho bonito para combinar com o site-->

<?php while($item = mysqli_fetch_assoc($result)){

?> 
    <div>
        <h3><?= $item['nome'] ?></h3>
        <p>R$ <?= $item['preco'] ?></p>
    </div>
<?php }
 ?>

<h3>Total: R$ <?=  $total ?></h3>

