<?php

class Connection {
    private static $instance = null;

    public static function getInstance() {

        if (!self::$instance) {

            $host = "localhost";
            $dbname = "AtividadeSomativaBiblioteca";
            $user = "root";
            $pass = "senaisp";

            try {
                self::$instance = new PDO(
                    "mysql:host=$host;charset=utf8",
                    $user,
                    $pass
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Cria banco e tabela se não existir
                self::$instance->exec("CREATE DATABASE IF NOT EXISTS $dbname;");
                self::$instance->exec("USE $dbname");

                self::$instance->exec("
                    CREATE TABLE IF NOT EXISTS livros (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        titulo VARCHAR(100) NOT NULL UNIQUE,
                        genero_literario VARCHAR(50) NOT NULL,
                        autor VARCHAR(100) NOT NULL,
                        ano_publicacao INT NOT NULL,
                        qtde INT NOT NULL
                    )
                ");

            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        return self::$instance;
    }
}
