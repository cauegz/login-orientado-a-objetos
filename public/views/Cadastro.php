<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <title>Cadastro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="d-flex w-100 justify-content-center align-items-center" style="height:100vh;">
    <div class="rounded shadow-lg w-25 h-auto d-flex flex-column align-items-center justify-content-center gap-3">
        <?php
            session_start();
            if(isset($_SESSION['log'])){
                echo $_SESSION['log'];
                unset ($_SESSION['log']);
            }
        ?>
        <form action="index.php?rota=Cadastro&acao=cadastrar" method="POST" class="d-flex flex-column gap-2">
            <div class="input-group">
                <input type="text" name="name" placeholder="Usuario">
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email">
            </div>

            <div class="input-group">
                <input type="text" name="phone" placeholder="Telefone">
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Senha">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
            <p>Já possui uma conta? <a href="index.php?rota=Auth&acao=login">Login</a></p>
        </form>
    </div>

</body>

</html>