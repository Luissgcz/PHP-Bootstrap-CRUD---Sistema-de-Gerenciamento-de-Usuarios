<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/index.php">Sistema de Usuários</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="h3">Lista de Usuários</h1>
            <div>
                <a href="./" class="btn btn-secondary me-2">Página Principal</a>
                <a href="./addUser.php" class="btn btn-success">Adicionar Usuário</a>
            </div>
        </div>

        <?php
        require ('./User.php');
        $userReq = new User();
        $responseReq = $userReq->getUsers();

        if (!empty($responseReq)) {
            echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
            foreach($responseReq as $user){
                extract($user);
                echo "
                <div class='col'>
                    <div class='card shadow-sm'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nome</h5>
                            <p class='card-text'><strong>Email:</strong> $email</p>
                            <a href='./updateUser.php?id=$id&nome=$nome&email=$email' class='btn btn-primary me-2'>Editar</a>
                            <a href='./deleteUser.php?id=$id' class='btn btn-danger'>Deletar</a>
                        </div>
                    </div>
                </div>";
            }
            echo '</div>';
        } else {
            echo "<p class='text-muted'>Nenhum usuário encontrado.</p>";
        }
        ?>
    </div>

</body>
</html>
