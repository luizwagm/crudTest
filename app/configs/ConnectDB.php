<?php

namespace App\Configs;

class ConnectDB
{
    private $pdo;
    private $credentials;

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    public function connect()
    {
        switch ($this->credentials['DATABASE'])
        {
            case 'PGSQL':
                $this->pdo = (new PgSqlConnection($this->credentials))->connect();
                break;
            case 'SQLite':
                $this->pdo = (new SQLiteConnection)->connect();
                break;
            default:
                $this->pdo = (new PgSqlConnection($this->credentials))->connect();
                break;
        }

        return $this->pdo;
    }
}
