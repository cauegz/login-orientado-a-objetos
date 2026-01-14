<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <title>Cadastro</title>
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
    <div class="rounded shadow-lg w-25 h-auto d-flex flex-column align-items-center justify-content-center gap-3">
        <h1>Faça seu cadastro</h1>
        <form action="index.php?rota=Cadastro&acao=cadastrar" onsubmit="return verifica_senha('password', 'password-confirm')" method="POST" class="d-flex flex-column gap-2 flex-wrap">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input type="text" name="name" placeholder="Usuario" class="form-control">
            </div>

            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>

            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-phone"></i>
                </span>
                <input type="text" name="phone" placeholder="Telefone" class="form-control">
            </div>

            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                <span class="input-group-text" id="olho-span" onclick="muda_senha('olho-i', 'password')">
                    <i class="fa-solid fa-eye" id="olho-i"></i>
                </span>
            </div>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" id="password-confirm" placeholder="Confirme a senha" class="form-control">
                <span class="input-group-text" id="olho-span-confirm"
                    onclick="muda_senha('olho-i-confirm', 'password-confirm')">
                    <i class="fa-solid fa-eye" id="olho-i-confirm"></i>
                </span>
            </div>

            <div class="d-grid gap-2">
                <span id="erro-senha"></span>
                <button type="submit"  class="btn btn-primary">
                    Enviar
                </button>
            </div>
            <p>Já possui uma conta? <a href="index.php?rota=Auth&acao=login">Login</a></p>
        </form>
    </div>
    <script>
        function muda_senha(olho_i, password) {
            var olho = document.getElementById(olho_i);
            var input_senha = document.getElementById(password);
            if (input_senha.type == "text") {
                input_senha.type = "password";
                olho.classList = "fa-solid fa-eye";
            } else {
                input_senha.type = "text";
                olho.classList = "fa-solid fa-eye-slash";
            }
        }
        function verifica_senha(senha1, senha2) {
            var senha1 = document.getElementById(senha1).value;
            var senha2 = document.getElementById(senha2).value;
            var erro = document.getElementById('erro-senha');

            if (senha1 != senha2) {
                erro.innerHTML = `
            As senhas não coincidem
        `;
                return false;
            }
            return true;
        }
    </script>
</body>

</html>