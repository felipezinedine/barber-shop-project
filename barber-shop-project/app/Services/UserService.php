<?php

namespace App\Services;
use App\DTOs\Users\UserCreateDTO;
use App\Repositories\Users\UserORM;
use App\Repositories\Users\UserRepositoryInterface;

class UserService
{
    public function __construct(
        protected UserORM $repository,
    ) {}

    public function create(UserCreateDTO $dto)
    {
        return $this->repository->create($dto);
    }

    public function searchPhone($param)
    {
        return $this->repository->searchPhone($param);
    }

    public function allProfessionals()
    {
        return $this->repository->allProfessionals();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}
