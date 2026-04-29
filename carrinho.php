<?php

session_start();
include("conexao.php");





$usuario_id = $_SESSION['id'] ?? 0;

$sql = "SELECT produtos.id, produtos.nome, produtos.preco, produtos.img, carrinho.quantidade
        FROM carrinho
        JOIN produtos ON carrinho.id_produto = produtos.id  
        WHERE carrinho.id_login_usuario = $usuario_id";


$result = mysqli_query($conexao, $sql);

$sqlTotal = "SELECT SUM(produtos.preco * carrinho.quantidade) AS total
             FROM carrinho
             JOIN produtos ON carrinho.id_produto = produtos.id  
             WHERE carrinho.id_login_usuario = $usuario_id";

$resultTotal = mysqli_query($conexao, $sqlTotal);
$total = mysqli_fetch_assoc($resultTotal)['total'] ?? 0;

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Carrinho</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f0f0f0e6;
        }

        /*CABEÇA DO SITE*/
        header {
            background: rgba(49, 25, 39, 0.8);
            backdrop-filter: blur(10px);
        }


        header {
            background: linear-gradient(135deg, #311927, #72224e, #F2C57C);
            color: white;
            padding: 7px 0;
            box-shadow: 0 4px 15px rgba(75, 25, 50, 0.3);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            margin: auto;
        }

        .logo img {
            width: 1200px;
            height: auto;
        }

        .menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }


        .menu a {
            color: #3d0d2af5;
            text-decoration: none;
            font-weight: 5000;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.3s;
        }

        .menu a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: 0;
            left: 0;
            background: #551c39;
            transition: 0.3s;
        }

        .menu a:hover {
            color: #D16A7E;
        }

        .menu a:hover::after {
            width: 100%;
        }

        .menu i {
            font-size: 30px;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .titulo-carrinho {
            font-family: Poppins;
            text-align: center;
            color: #311927;
            position: relative;
            font-size: 35px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 5px rgba(179, 12, 112, 0.1);
        }

        .titulo-carrinho::after {
            content: "";
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #311927, #72224e);
            display: block;
            margin: 10px auto 0;
            border-radius: 10px;
        }

        .titulo {
            font-family: Poppins;
            color: #311927;
            position: relative;
        }

        .container-carrinho img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 20%;
            padding: 5px;
            margin: 5px;
        }

        .container-carrinho {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 320px;
            margin-top: 50px;
        }

        p {
            color: #311927;
            font-family: Poppins;
            padding: 5px 0;
        }

        h3 {
            font-size: 30px;
        }

        .titulo {
            color: #311927;
            font-family: Poppins;
            padding: 5px 0;
        }

        .btn {
            background-color: #F2C57C;
            border: none;
            padding: 8px 12px;
        }

        .btn-box {
            display: flex;
            gap: 10px;
            /* espaço entre os botões */
            justify-content: center;
            /* centraliza no td */
            align-items: center;
        }

        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            transition: 0.2s ease;
            color: #72224e;
        }

        .btn.editar {
            background-color: #3498db;
        }

        .btn.excluir:hover {
            background-color: #D16A7E;
        }
    </style>

<body>
    <header>
        <div class="header-container">
            <img src="imagens/aroma_flow.png" alt="Aroma Flow">

            <nav>

                <ul class="menu">
                    <li>
                        <a href="./loja.html">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>

                    <li>
                        <a href="./favoritos.html">
                            <i class="fas fa-heart"></i>
                        </a>
                    </li>

                    <li>
                        <a href="./login.php">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>

                    <li>
                        <a href="./carrinho.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <h2 class="titulo-carrinho">Seu Carrinho</h2>

    <?php while ($item = mysqli_fetch_assoc($result)) {

    ?>
        <div class="container-carrinho">
            <div class="carrinho">
                <img src="<?= htmlspecialchars($item['img']) ?>" width="100">
                <h3><?= $item['nome'] ?></h3>
                <p>R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>
            </div>

            <a href="deletar_produtos.php?id=<?= $item['id'] ?>"
                class="btn"
                onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                Excluir
            </a>
        </div>

    <?php } ?>


    <h3 class="titulo">Total: R$ <?= number_format($total, 2, ',', '.') ?></h3>

</body>