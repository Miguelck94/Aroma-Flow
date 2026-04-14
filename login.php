<?php
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? "";
    $senha = $_POST['senha'] ?? "";

    if (!empty($email) && !empty($senha)) {
        
        // 1. TENTA BUSCAR NA TABELA DE FUNCIONÁRIOS PRIMEIRO
        $sql_func = "SELECT * FROM funcionario WHERE email = ?";
        $stmt_func = mysqli_prepare($conexao, $sql_func);
        mysqli_stmt_bind_param($stmt_func, "s", $email);
        mysqli_stmt_execute($stmt_func);
        $res_func = mysqli_stmt_get_result($stmt_func);

        if ($user = mysqli_fetch_assoc($res_func)) {
            // Encontrou na tabela de funcionários, agora verifica a senha
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['tipo'] = 'funcionario'; // Forçamos o tipo aqui

                header("Location: controle_dados.php");
                exit;
            } else {
                echo "<script>alert('Senha incorreta (Funcionário)!');</script>";
            }
        } 
        
        // 2. SE NÃO ACHOU NO FUNCIONÁRIO, TENTA BUSCAR NA TABELA DE USUÁRIOS
        else {
            $sql_user = "SELECT * FROM login_usuario WHERE email = ?";
            $stmt_user = mysqli_prepare($conexao, $sql_user);
            mysqli_stmt_bind_param($stmt_user, "s", $email);
            mysqli_stmt_execute($stmt_user);
            $res_user = mysqli_stmt_get_result($stmt_user);

            if ($user = mysqli_fetch_assoc($res_user)) {
                // Encontrou na tabela de clientes, agora verifica a senha
                if (password_verify($senha, $user['senha'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['nome'] = $user['nome'];
                    $_SESSION['tipo'] = 'cliente';

                    header("Location: loja.html");
                    exit;
                } else {
                    echo "<script>alert('Senha incorreta!');</script>";
                }
            } else {
                // Não achou em nenhuma das duas tabelas
                echo "<script>alert('E-mail não cadastrado em nosso sistema!');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Aroma Flow</title>
    <link rel="stylesheet" href="./loja.css">
</head>
<body>
    <div class="login-box" style="margin: 100px auto; width: 300px; text-align: center; border: 1px solid #ccc; padding: 20px;">
        <form action="login.php" method="POST">
            <h3>Login Aroma Flow</h3>
            <input type="email" name="email" placeholder="E-mail" required style="width: 100%; margin-bottom: 10px;">
            <input type="password" name="senha" placeholder="Senha" required style="width: 100%; margin-bottom: 10px;">
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>