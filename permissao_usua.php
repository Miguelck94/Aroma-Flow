<?php
session_start();

if ($_SESSION['tipo'] != 'usuario') {
    header("Location: login.php");
    exit;
}

echo "Bem-vindo usuário!";
?>