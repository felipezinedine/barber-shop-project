<?php

namespace App\Http\Controllers\Barber\Schedule;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ServicesService;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function __construct(
        protected ServicesService $service,
        protected UserService $userService,
    ) {}
    public function index()
    {
        return view('barber.schedule.index');
    }

    public function professionalChoice($id)
    {
        $data['professionals'] = $this->userService->allProfessionals();
        $data['service'] = $this->service->find($id);

        return view('barber.schedule.professionalChoice', $data);
    }

    public function newSchedule(Request $request)
    {
        $data['services'] = $this->service->getAll($request);
        return view('barber.schedule.new', $data);
    }

    public function scheduling($cutId, $professionalId)
    {
        $data['cut'] = $this->service->find($cutId);
        $data['prof'] = $this->userService->find($professionalId);

        return view('barber.schedule.schedulings', $data);
    }

    public function eventsAll()
    {
        $events = $this->service->eventsAll();
        return json_encode($events);
    }

    public function getWeeklyEvents($professionalId)
    {
        $events = $this->service->events($professionalId);
        $formattedEvents = $events->map(function($event) {
            $start = Carbon::parse($event->time)->addHours(3)->toIso8601String();
            $end = Carbon::parse($event->time)->addHours(3)->addMinutes(intval($event->services->time))->toIso8601String();

            return [
                'title' => $event->title,
                'start' => $start,
                'end' => $end
            ];
        });
        return json_encode($formattedEvents);
    }

    public function lastStep(Request $request)
    {
        $data = Carbon::create($request->get('start'))->format('Y-m-d');
        $hours = Carbon::create($request->get('start'))->format('H:i:s');

        $data = [
            'data' => $data,
            'hours' => $hours,
            'userId' => $request->get('userId'),
            'prof' => $this->userService->find($request->get('profId')),
            'cut' => $this->service->find($request->get('cutId'))
        ];

        return view('barber.schedule.lastStep', $data);
    }
}
