<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

require('./User.php');

$deleteUser = new User();
$result = $deleteUser->deleteUser($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Usuário</title>
    <meta http-equiv="refresh" content="3;url=./listUsers.php"> <!-- redireciona após 3 segundos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="alert alert-success text-center" role="alert">
            Usuário deletado com sucesso! Redirecionando para a lista de usuários...
        </div>
    </div>

</body>
</html>
