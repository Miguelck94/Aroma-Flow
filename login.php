<?php
session_start();
include("conexao.php");

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? "");
    $senha = $_POST['senha'] ?? "";

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {

        // Tenta funcionário primeiro
        $stmt = mysqli_prepare($conexao, "SELECT * FROM funcionario WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['id']   = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['tipo'] = 'funcionario';
            header("Location: index_loja.php");
            exit;
        }

        // Tenta cliente
        $stmt2 = mysqli_prepare($conexao, "SELECT * FROM login_usuario WHERE email = ?");
        mysqli_stmt_bind_param($stmt2, "s", $email);
        mysqli_stmt_execute($stmt2);
        $user2 = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt2));

        if ($user2 && password_verify($senha, $user2['senha'])) {
            $_SESSION['id']   = $user2['id'];
            $_SESSION['nome'] = $user2['nome'];
            $_SESSION['tipo'] = 'cliente';
            header("Location: loja.html");
            exit;
        }

        $erro = "E-mail ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px 36px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 2px solid #311927;
            animation: fadeUp 0.4s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 600;
            color: #311927;
            margin-bottom: 4px;
        }

        .subtitle {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 28px;
        }

        .erro-msg {
            background: #fff0f0;
            border: 1px solid #ffcccc;
            color: #cc0000;
            font-size: 0.85rem;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .field {
            margin-bottom: 16px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        input {
            padding: 11px 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            color: #222;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #311927;
            box-shadow: 0 0 0 3px rgba(49, 25, 39, 0.1);
        }

        input::placeholder {
            color: #bbb;
        }

        button {
            width: 100%;
            margin-top: 8px;
            padding: 13px;
            background: #311927;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button:hover  { background: #4a2639; }
        button:active { transform: scale(0.98); }

        .divider {
            height: 1px;
            background: #eee;
            margin: 24px 0;
        }

        .footer-text {
            text-align: center;
            font-size: 0.78rem;
            color: #aaa;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="logo">Sistema</div>
    <p class="subtitle">Faça login para continuar</p>

    <?php if (!empty($erro)): ?>
        <div class="erro-msg">⚠️ <?php echo htmlspecialchars($erro); ?></div>
    <?php endif; ?>

    <form action="" method="POST" novalidate>
        <div class="field">
            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="seu@email.com"
                autocomplete="email"
                required>
        </div>

        <div class="field">
            <label for="senha">Senha</label>
            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="••••••••"
                autocomplete="current-password"
                required>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <div class="divider"></div>
    <p class="footer-text">Funcionários e clientes usam o mesmo acesso.</p>
</div>

</body>
</html>
