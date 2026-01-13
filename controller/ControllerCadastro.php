<?php
class ControllerCadastro
{
    public function cadastrar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            require "views/Cadastro.php";
        } else {
            require "../config/Database.php";
            require "../models/Usuario.php";

            session_start();

            $name = trim(string: $_POST['name']) ?? "";
            $phone = trim(string: $_POST['phone']) ?? "";
            $email = trim(string: $_POST['email']) ?? "";
            $password = trim(string: $_POST['password']) ?? "";

            $password = password_hash(password: $password, algo: PASSWORD_DEFAULT);

            $pdo = Database::connect();

            $email = filter_var(value: $email, filter: FILTER_SANITIZE_EMAIL);
            $email = filter_var(value: $email, filter: FILTER_VALIDATE_EMAIL);


            $user = new User(name: $name, email: $email, phone: $phone, password: $password, pdo: $pdo);
            //se o email já existe no banco, volta pro index.php
            if ($user->EmailExiste(email: $email)) {
                $_SESSION['log'] = "Email já cadastrado";
                header(header: "Location: index.php?rota=Cadastro&acao=cadastrar");
                exit;
            }

            $result = $user->cadastrar();

            //checa se o usuário foi inserido no banco
            if ($result) {
                $_SESSION['log'] = "Cadastro realizado";
                header(header: "Location: index.php");
                exit;
            } else {
                $_SESSION['log'] = "Cadastro não realizado";
                header(header: "Location: index.php");
                exit;
            }
        }
    }
}