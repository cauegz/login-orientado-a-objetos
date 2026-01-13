<?php

class User
{
    public function __construct(public string $name, public string $email, public string $phone, public string $password, public PDO $pdo)
    {

    }
    public function cadastrar(): bool
    {
        $sql = "
            INSERT INTO USUARIO (nome, telefone, email, senha) 
            VALUES (:name, :phone, :email, :password);
        ";

        $stmt = $this->pdo->prepare(query: $sql);
        $stmt->execute(params: [
            ":name" => $this->name,
            ":phone" => $this->phone,
            ":email" => $this->email,
            ":password" => $this->password
        ]);

        if ($stmt->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function EmailExiste(string $email): bool
    {
        $sql = "
            SELECT 1 from USUARIO
            WHERE email = :email
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":email" => $email
        ]);

        if($stmt->fetch()){
            return true;
        } else {
            return false;
        }
    }
}