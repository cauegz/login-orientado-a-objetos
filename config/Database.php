<?php
    class Database {
        private static $username = "root";
        private static $dbname = "loginOO";
        private static $password = "";
        private static $server = "localhost";

        public static function connect(): PDO{
            try {
                return $pdo = new PDO(
                    dsn: "mysql:host=" . self::$server . ";dbname=" . self::$dbname . ";charset=utf8",
                    username: self::$username,
                    password: self::$password
                    );
                    echo "CU GIGANTESCO";
            } catch (PDOException $e) {
                die("Erro de conexão -> " . $e->getMessage());
            }
        }
    }
    