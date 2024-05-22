<?php

namespace App\Repositories\Schedule;
use App\DTOs\Schedule\ScheduleCreateDTO;

interface ScheduleRepository
{
    public function all($id, $prof_id);
    public function create(ScheduleCreateDTO $dto);
    public function delete($id);
}
