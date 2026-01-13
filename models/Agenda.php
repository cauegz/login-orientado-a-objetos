<?php

class Agendas
{
    public function __construct(public PDO $pdo)
    {

    }
    public function listarTodos(string $id_table): array
    {
        $sql = "SELECT * FROM contatos WHERE 
        id_usuario = :id_table";
        $stmt = $this->pdo->prepare(query: $sql);
        $stmt->execute([
            ":id_table" => $id_table
        ]);
        return $stmt->fetchAll(mode: PDO::FETCH_ASSOC);
    }
    public function pesquisaContato(string $search): array
    {
        $sql = "SELECT * FROM contatos 
                        WHERE nome LIKE :search";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":search" => "%" . $search . "%"
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function criaContato(string $name, string $phone, string $email, int $id_table): bool
    {
        $sql = "INSERT INTO contatos (nome,telefone,email,id_usuario) VALUES 
            (:nome, :phone, :email, :id_table);
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':id_table' => $id_table
        ]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function editarContato(string $name, string $phone, string $email, int $id): bool
    {
        $sql = "UPDATE contatos
                SET nome = :nome,
                    telefone = :phone,
                    email = :email
                WHERE id = :id;
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':id' => $id
        ]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function excluirContato(string $id): void
    {
        $sql = "DELETE FROM contatos WHERE
        id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
    }
    public function dadosPorId(string $id): array
    {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);

        $valores = $stmt->fetch(PDO::FETCH_ASSOC);
        return $valores;
    }
}