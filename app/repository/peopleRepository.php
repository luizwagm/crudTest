<?php

namespace App\Repository;

use App\Model\peopleModel;
use PDO;

class peopleRepository
{
    private $pdo;
    protected $model;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->model = new peopleModel;
    }

    public function create($payload)
    {
        $query = $this->pdo->prepare(
            'INSERT INTO ' . $this->model->table . ' (fullname, document, email, created_at, updated_at) VALUES (?, ?, ?, ?, ?)'
        );
        $query->execute([
            $payload['fullname'],
            $payload['document'],
            $payload['email'],
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
        ]);
    }

    public function update($payload)
    {
        $query = $this->pdo->prepare(
            'UPDATE ' . $this->model->table . ' SET fullname = :fullname, document = :document, email = :email, updated_at = :updated WHERE id = :id'
        );

        $query->bindValue(":fullname", $payload['fullname'], PDO::PARAM_STR);
        $query->bindValue(":document", $payload['document'], PDO::PARAM_STR);
        $query->bindValue(":email", $payload['email'], PDO::PARAM_STR);
        $query->bindValue(":updated", date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $query->bindValue(":id", $payload['id'], PDO::PARAM_INT);
       
        $exec = $query->execute();

        if ($exec) {
            echo "success";
        }
    }

    public function get()
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->model->table . ' AND deleted_at = null');
        $query->execute();
        
        return $query->fetchAll();
    }

    public function first($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->model->table . ' WHERE id = :id AND deleted_at = null');
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetchAll();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare('UPDATE ' . $this->model->table . ' SET deleted_at = :deleted WHERE id = :id');

        $query->bindValue(":deleted", date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetchAll();
    }
}
