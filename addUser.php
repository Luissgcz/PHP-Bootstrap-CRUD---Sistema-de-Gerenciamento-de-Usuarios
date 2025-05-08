<?php
require('./User.php');

$reqForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($reqForm['nome']) && !empty($reqForm['email'])) {
    $newUser = new User();
    $newUser->addUser($reqForm['nome'], $reqForm['email']);
    header("Location: ./listUsers.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/index.php">Sistema de Usuários</a>
        </div>
    </nav>

    <!-- Formulário -->
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-4">Adicionar Novo Usuário</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu email" required>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="./" class="btn btn-secondary ms-2">Página Principal</a>
                    <a href="./listUsers.php" class="btn btn-primary ms-2">Listar Usuários</a>
                </form>
            </div>
        </div>
    </div>
