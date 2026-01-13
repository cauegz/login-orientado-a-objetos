<?php

class ControllerHome
{
    public function index()
    {
        session_start();
        require "../config/Database.php";
        $pdo = Database::connect();
        require "../auth/authLogin.php";
        require __DIR__ . "/../models/Agenda.php";


        //checa se o usuário clicou no botao de exibir todos
        if (isset($_GET['botao'])) {
            unset($search);
        }

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }

        //listar usuarios
        if (!isset($search)) {
            $contatos = new Agendas(pdo: $pdo);
            $contatos = $contatos->listarTodos(id_table: $_SESSION['id_table']);
        }

        //pesquisar usuario
        else {
            $contatos = new Agendas(pdo: $pdo);
            $contatos = $contatos->pesquisaContato(search: $search);
        }   
        require "views/Home.php";
    }
}