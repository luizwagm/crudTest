<?php

namespace Database\Migrations;

class CreatePeopleTable
{
    private static $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function execute()
    {
        try {
            $this->create();
            
            echo 'Create table sucessfull';
        } catch (\PDOException $e) {
            echo 'Table not create';
        }
    }

    private function create()
    {
        $commands = [
            'CREATE TABLE IF NOT EXISTS people (
                id   INTEGER PRIMARY KEY NOT NULL,
                fullname VARCHAR(255) NOT NULL,
                document  VARCHAR(11) NOT NULL,
                email VARCHAR(100) NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                deleted_at DATETIME NULL
            )'
        ];
        
        foreach ($commands as $command)
        {
            $this->pdo->exec($command);
        }
    }
}
