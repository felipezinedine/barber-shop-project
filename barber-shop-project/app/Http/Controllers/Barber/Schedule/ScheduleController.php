<?php

namespace App\Http\Controllers\Barber\Schedule;

use Carbon\Carbon;
use App\Models\Help;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ScheduleService;
use App\Services\ServicesService;
use App\Http\Controllers\Controller;
use App\DTOs\Schedule\ScheduleCreateDTO;

class ScheduleController extends Controller
{
    public function __construct(
        protected ScheduleService $schedulling,
        protected ServicesService $service,
        protected UserService $userService,
    ) {
    }
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

        $formattedEvents = $events->map(function ($event) {

            $start = Carbon::parse($event->date . ' ' . $event->time)
                ->setTimezone('UTC')
                ->format('Y-m-d H:i:s');

            $end = Carbon::parse($event->date . ' ' . $event->time)
                ->setTimezone('UTC')
                ->addMinutes(intval($event->services->time))
                ->format('Y-m-d H:i:s');

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
        session()->put('date', $request->get('start'));

        $data = Help::dateTimeBr($request->get('start'));
        $hours = Carbon::create($request->get('start'))->addHours(-3)->format('H:i');

        $data = [
            'data' => $data,
            'hours' => $hours,
            'userId' => $request->get('userId'),
            'prof' => $this->userService->find($request->get('profId')),
            'cut' => $this->service->find($request->get('cutId'))
        ];

        return view('barber.schedule.lastStep', $data);
    }

    public function scheduleCompleted(Request $request)
    {
        $schedulling = $this->schedulling->create(ScheduleCreateDTO::createNewSchedulling($request));

        if(isset($schedulling) && $schedulling != null && $schedulling != false){
            return redirect('/reservations/');
        } else {
            return redirect()->back();
        }
    }
}
