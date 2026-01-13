<?php
class ControllerAuth
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            require "views/Login.php";
        } else {
            require "../config/Database.php";
            require "../models/AuthUsuario.php";

            session_start();

            $email = trim(string: $_POST['email']) ?? "";
            $password = trim(string: $_POST['password']) ?? "";

            $pdo = Database::connect();

            $user = new AuthUsuario(pdo: $pdo);
            $logged = $user->login(email: $email, password: $password);
            
            if($logged){
                $_SESSION['logged'] = true;
                $_SESSION['name'] = $user->encontraNomePorEmail(email: $email);
                $_SESSION['id_table'] = $user->IdPorEmail(email: $email);
                header(header: "Location: index.php?rota=Home&acao=index");
                exit;
            } else {
                $_SESSION['logged'] = false;
                $_SESSION['log'] = "Email ou senha incorretos";
                header(header: "Location: index.php");
                exit;
            }
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header("Location: index.php");
    }
}