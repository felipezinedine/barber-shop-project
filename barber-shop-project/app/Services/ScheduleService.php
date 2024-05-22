<?php

namespace App\Services;
use App\DTOs\Schedule\ScheduleCreateDTO;
use App\Repositories\Schedule\ScheduleORM;

class ScheduleService
{
    public function __construct(
        protected ScheduleORM $repository,
    ) {}

    public function all($id)
    {
        return $this->repository->all($id);
    }
    public function create(ScheduleCreateDTO $dto)
    {
        return $this->repository->create($dto);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
