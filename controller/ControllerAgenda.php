<?php
class ControllerAgenda
{
    public function criarContato()
    {
        require __DIR__ . "/../config/Database.php";
        $pdo = Database::connect();
        require __DIR__ . "/../models/Agenda.php";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . "/../public/views/AdicionarContato.php";
            return;
        }
        session_start();

        $id_table = $_SESSION['id_table'];

        $name = trim($_POST['name'] ?? "");
        $phone = $_POST['phone'] ?? "";
        $email = trim($_POST['email'] ?? "");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['erro'] = "Email não é válido";
            header("Location: ../index.php");
            exit;
        }

        $agenda = new Agendas(pdo: $pdo);
        $result = $agenda->criaContato(name: $name, phone: $phone, email: $email, id_table: $id_table);

        if ($result) {
            $_SESSION['log'] = "Contato adicionado";
            header("Location: index.php?rota=Home&acao=index");
            exit;
        } else {
            $_SESSION['log'] = "Erro ao adicionar contato";
            header("Location: index.php?rota=Home&acao=index");
            exit;
        }
    }
    public function editarContato()
    {
        require __DIR__ . "/../config/Database.php";
        $pdo = Database::connect();
        require __DIR__ . "/../models/Agenda.php";

        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $agenda = new Agendas($pdo);
            $valores = $agenda->dadosPorId(id: $id);
            require __DIR__ . "/../public/views/EditarContato.php";
            return;
        }



        $name = trim($_POST['name'] ?? "");
        $phone = $_POST['phone'] ?? "";
        $email = trim($_POST['email'] ?? "");

        $agenda = new Agendas(pdo: $pdo);
        $res = $agenda->editarContato(name: $name, phone: $phone, email: $email, id: $id);

        if ($res) {
            $_SESSION['log'] = "Contato editado";
            header("Location: index.php?rota=Home&acao=index");
            exit;
        } else {
            $_SESSION['log'] = "Erro ao editar";
            header("Location: index.php?rota=Home&acao=index");
            exit;
        }
    }
    public function excluirContato()
    {
        require __DIR__ . "/../config/Database.php";
        $pdo = Database::connect();
        require __DIR__ . "/../models/Agenda.php";

        $id = $_GET['id'];

        $agenda = new Agendas(pdo: $pdo);
        $agenda->excluirContato(id: $id);

        header("Location: index.php?rota=Home&acao=index");
        exit;
    }
}
