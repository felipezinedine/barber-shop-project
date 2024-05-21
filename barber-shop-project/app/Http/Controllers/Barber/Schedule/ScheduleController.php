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

    public function getWeeklyEvents($date, $professionalId)
    {
        $startOfWeek = Carbon::parse($date)->startOfWeek();
        $endOfWeek = Carbon::parse($date)->endOfWeek();
        $events = $this->service->events($startOfWeek, $endOfWeek, $professionalId);
        return response()->json($events);
    }
}
