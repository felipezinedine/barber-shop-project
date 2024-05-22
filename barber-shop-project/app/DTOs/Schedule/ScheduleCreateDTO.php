<?php

namespace App\DTOs\Schedule;

class ScheduleCreateDTO
{
    public function __construct(
        public string $professional_id,
        public string $service_id,
        public string $client_id,
        public string $date,
        public string $hours,
        public bool $booked,
        public string $title
    ) {}

    public static function createNewSchedulling($request):self
    {
        return new self(
            $request->professional_id,
            $request->service_id,
            $request->client_id,
            $request->date,
            $request->hours,
            true,
            'RESERVADO',
        );
    }
}
