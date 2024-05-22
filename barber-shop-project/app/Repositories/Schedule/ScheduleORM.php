<?php

namespace App\Repositories\Schedule;
use App\Models\Scheduling;
use App\DTOs\Schedule\ScheduleCreateDTO;

class ScheduleORM
{
    public function __construct(
        protected Scheduling $scheduling
    ) {}

    public function all($id)
    {
        $reservations = $this->scheduling->setConnection('mysql')
                             ->orWhere('client_id', $id)
                             ->with(['services', 'user'])
                             ->get();
        return $reservations;
    }

    public function find($id)
    {
        $schedule = $this->scheduling->setConnection('mysql')->where('id', '=', $id)->first();
        return $schedule;
    }
    public function create(ScheduleCreateDTO $dto)
    {
        $query = $this->scheduling->setConnection('mysql')
                      ->where('professional_id', '=', $dto->professional_id)
                      ->where('date', '=', $dto->date)
                      ->where('time', '=', $dto->hours)
                      ->first();

        if(isset($query) && $query->id != null) {
            return false;
        } else {
            $data = [
                'professional_id' => $dto->professional_id,
                'client_id' => $dto->client_id,
                'service_id' => $dto->service_id,
                'date' => $dto->date,
                'time' => $dto->hours,
                'title'=> $dto->title,
                'booked' => $dto->booked,
            ];

            $schedule = $this->scheduling->setConnection('mysql')->create($data);

            return $schedule;
        }
    }

    public function delete($id)
    {
        $schedule = $this->find($id);

        if($schedule->id != null) {
            $schedule->delete();
            return true;
        }
    }
}
