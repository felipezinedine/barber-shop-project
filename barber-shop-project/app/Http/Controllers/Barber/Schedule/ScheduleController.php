<?php

namespace App\Http\Controllers\Barber\Schedule;

use Illuminate\Http\Request;
use App\Services\ServicesService;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function __construct(
        protected ServicesService $service,
    ) {}
    public function index()
    {
        return view('barber.schedule.index');
    }

    public function professionalChoice($id)
    {
        $service = $this->service->find($id);
        return view('barber.schedule.professionalChoice', ['service' => $service]);
    }

    public function newSchedule(Request $request)
    {
        $services = $this->service->getAll($request);
        $data['services'] = $services;
        return view('barber.schedule.new', $data);
    }
}
