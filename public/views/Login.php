<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/c25eca0384.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<?php
session_start();
if (isset($_SESSION['log'])) {
    echo '<div class="caixa-erro"><i class="fa-solid fa-triangle-exclamation" style="color:yellow;"></i><p class="paragrafo-erro">' . $_SESSION['log'] . '</p></div>';
    unset($_SESSION['log']);
}
?>

<body class="d-flex w-100 justify-content-center align-items-center" style="height:100vh;">
    <div class="rounded shadow-lg w-auto h-auto p-3 flex-column d-flex align-items-center justify-content-center gap-3">
        <h1>Sistema de agenda de contatos</h1>

        <form action="index.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" placeholder="Senha" class="form-control">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
            <p>Ainda não possui uma conta? <a href="index.php?rota=Cadastro&acao=cadastrar">Cadastrar</a></p>
        </form>
    </div>

</body>

</html>