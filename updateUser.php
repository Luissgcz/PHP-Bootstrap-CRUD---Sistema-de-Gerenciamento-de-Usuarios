<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
$email = filter_input(INPUT_GET, 'email', FILTER_DEFAULT);

require('./User.php');

$updateUser = new User();

$reqForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($reqForm)) {
    $updateUser->updateUser($id, $reqForm['nome'], $reqForm['email']);
    header("Location: ./listUsers.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/index.php">Sistema de Usuários</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-4">Editar Usuário</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($nome); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <button type="submit" name="buttonSend" class="btn btn-primary">Salvar Alterações</button>
                    <a href="./listUsers.php" class="btn btn-secondary ms-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
