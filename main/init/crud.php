<?php

class Database
{
    private $conn; // objeto de conexão

    // construtor
    public function __construct()
    {
        try {
            require_once 'db_config.php';

            $this->conn = new PDO("mysql:host=".dbHost.";dbname=".dbName, dbUser, dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
    }

    // método INSERT
    public function create($table, $data)
    {
        try {
            $fields = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $exception) {
            echo "Erro ao criar registro: " . $exception->getMessage();
            return false;
        }
    }

    // método SELECT
    public function read($table, $condition = "")
    {
        try {
            $sql = "SELECT * FROM {$table} {$condition}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Erro ao ler registros: " . $exception->getMessage();
            return [];
        }
    }

    // método UPDATE
    public function update($table, $data, $condition)
    {
        try {
            $fields = "";
            foreach ($data as $key => $value) {
                $fields .= $key . "=:" . $key . ", ";
            }
            $fields = rtrim($fields, ", ");
            $sql = "UPDATE {$table} SET {$fields} {$condition}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $exception) {
            echo "Erro ao atualizar registro: " . $exception->getMessage();
            return false;
        }
    }

    // método DELETE
    public function delete($table, $condition)
    {
        try {
            $sql = "DELETE FROM {$table} {$condition}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
        } catch (PDOException $exception) {
            echo "Erro ao deletar registro: " . $exception->getMessage();
            return false;
        }
    }

}

?>
