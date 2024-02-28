<?php

namespace App\Controller;

use App\Service\crudService;
use App\Validation\inputValidation;

class crudController
{
    protected $service;
    protected $validation;

    public function __construct($pdo)
    {
        $this->service = new crudService($pdo);
        $this->validation = new inputValidation;
    }

    public function store($payload)
    {
        if (! $this->validation->cpf($payload['document'])) {
            return 'erro CPF inválido';
        }

        if (! $this->validation->email($payload['email'])) {
            return 'erro E-mail inválido';
        }

        return $this->service->store($payload);
    }

    public function get()
    {
        return $this->service->get();
    }

    public function first($id)
    {
        return $this->service->first($id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
