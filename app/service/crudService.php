<?php

namespace App\Service;

use App\Repository\peopleRepository;

class crudService
{
    protected $repository;

    public function __construct($pdo)
    {
        $this->repository = new peopleRepository($pdo);
    }

    public function store($payload)
    {
        if (! empty($payload['id'])) {
            return $this->repository->update($payload);
        }

        return $this->repository->create($payload);
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function first($id)
    {
        return $this->repository->first($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
