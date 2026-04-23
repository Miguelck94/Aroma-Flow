<?php
include("conexao.php");

$sql = "SELECT * FROM listagem_produtos";
$result = mysqli_query($conexao, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel do Funcionário</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #311927;
            margin: 0;
            padding: 0;
            color: white;
        }

        header {
            background-color: #72224e;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logout {
            background-color: #F2C57C;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            color: black;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #72224e;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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

        /* Botão editar */
        .btn.editar {
            background-color: #3498db;
        }

        .btn.editar:hover {
            background-color: #2980b9;
        }

        /* Botão excluir */
        .btn.excluir {
            background-color: #e74c3c;
        }

        .btn.excluir:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>


    <header>
        Painel de Controle de Produtos
    </header>


    <div class="container">


        <div class="top-bar">
            <h2>Lista de Produtos</h2>
            <a href="loja.html" class="logout">Sair</a>
        </div>




        <?php if (mysqli_num_rows($result) > 0): ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Saída</th>
                    <th>Ações</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['quantidade'] ?></td>
                        <td><?= $row['saida'] ?></td>
                        <td>
                            <a href="editar_func.php?id=<?= $row['id'] ?>" class="btn">Editar</a>

                            <a href="excluir_func.php?id=<?= $row['id'] ?>"
                                class="btn"
                                onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>

        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>