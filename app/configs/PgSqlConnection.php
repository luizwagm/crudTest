<?php

namespace App\Configs;

use PDO;

class PgSqlConnection {
    private $pdo;

    private $host;
    private $db;
    private $user;
    private $password;
    private $port;

    public function __construct($credentials)
    {
        $this->host = $credentials['HOST'];
        $this->user = $credentials['USER'];
        $this->db = $credentials['DB'];
        $this->password = $credentials['PASSWORD'];
        $this->port = $credentials['PORT'];
    }

    public function connect() {
        try {
            if ($this->pdo == null) {
                $this->pdo = new \PDO(
                    "pgsql:host=$this->host;port=$this->port;dbname=$this->db;", $this->user, $this->password, 
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                );
            }

            return $this->pdo;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}