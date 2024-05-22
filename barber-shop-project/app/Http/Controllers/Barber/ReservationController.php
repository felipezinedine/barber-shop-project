<?php

namespace App\Http\Controllers\Barber;

use Carbon\Carbon;
use App\Models\Help;
use Illuminate\Http\Request;
use App\Services\ScheduleService;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function __construct(
        protected ScheduleService $schedule,
    ) {}
    public function index()
    {
        $id = auth()->user()->id;
        $schedullings = $this->schedule->all($id);
        $data['schedullings'] = $schedullings;

        foreach($schedullings as $sc)
        {
            $data['date'] = Help::dateTimeBr($sc->time);
            $data['hours'] = Carbon::create($sc->time)->format('H:i');
        }

        return view('barber.reservations.index', $data);
    }

    public function delete($id)
    {
        $this->schedule->delete($id);
        return redirect()->back();
    }
}
