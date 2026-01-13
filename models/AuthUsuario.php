<?php

class AuthUsuario
{
    public function __construct(public PDO $pdo)
    {

    }
    public function login(string $email, string $password): mixed
    {
        $sql = "
            SELECT nome, telefone, id, senha FROM USUARIO
            WHERE email = :email;
        ";

        $stmt = $this->pdo->prepare(query: $sql);
        $stmt->execute(params: [
            ":email" => $email
        ]);

        $result = $stmt->fetch();
        if ($stmt->rowCount() >= 1 && password_verify(password: $password, hash: $result['senha'])) {
            return $result;
        } else {
            return false;
        }
    }
    public function encontraNomePorEmail(string $email): string|false
    {
        $sql = "
            SELECT nome FROM USUARIO
            WHERE email = :email
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":email" => $email
        ]);
        $resultado = $stmt->fetchColumn();
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
    public function IdPorEmail(string $email): bool|int
    {
        $sql = "
            SELECT id from USUARIO
            WHERE email = :email
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":email" => $email
        ]);
        $result = $stmt->fetchColumn();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}