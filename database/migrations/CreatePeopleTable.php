<?php

namespace Database\Migrations;

class CreatePeopleTable
{
    private $pdo;

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
            die($e->getMessage());
        }
    }

    private function create()
    {
        $commands = [
            'CREATE TABLE IF NOT EXISTS people (
                id   SERIAL PRIMARY KEY NOT NULL,
                fullname VARCHAR(255) NOT NULL,
                document  VARCHAR(11) NOT NULL,
                email VARCHAR(100) NOT NULL,
                created_at TIMESTAMPTZ NULL DEFAULT NULL,
                updated_at TIMESTAMPTZ NULL DEFAULT NULL,
                deleted_at TIMESTAMPTZ NULL DEFAULT NULL
            )'
        ];
        
        foreach ($commands as $command)
        {
            $this->pdo->exec($command);
        }
    }
}
