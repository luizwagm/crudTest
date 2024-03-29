<?php

namespace App\Configs;

class SQLiteConnection {
    private $pdo;

    public function connect() {
        try {
            if ($this->pdo == null) {
                $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            }

            return $this->pdo;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}