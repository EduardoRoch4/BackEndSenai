<?php 

class connection{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            try {
                $host = "localhost";
                $dbname = "aula15";
                $user = "root";
                $pass = "senaisp";

                self::$instance = new PDO(
                    "mysql:host=$host;
                    charset=utf8",
                    $user,
                    $pass
                );
                self::$instance->setAttribute 
                (attribute: PDO::ATTR_ERRMODE,
                value: PDO::ERRMODE_EXCEPTION);

                self::$instance->exec 
                (statement: "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
                self::$instance->exec(statement: "USE $dbname");
            } catch (PDOException $e) {
                echo "Erro na conexão: " . 
                $e->getMessage();
            }
        }
        return self::$instance;
    }
}