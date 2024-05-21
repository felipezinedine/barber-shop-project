<?php

namespace App\Services;
use App\Repositories\Services\ServiceORM;

class ServicesService
{
    public function __construct(
        protected ServiceORM $repository,
    ) {}

    public function allServices()
    {
        return $this->repository->allServices();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function getAll($request)
    {
        return $this->repository->getAll($request);
    }

    public function search($request)
    {
        return $this->repository->search($request);
    }

    public function events($startOfWeek, $endOfWeek, $id)
    {
        return $this->repository->events($startOfWeek, $endOfWeek, $id);
    }
}
