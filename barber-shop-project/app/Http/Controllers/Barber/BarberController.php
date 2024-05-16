<?php

namespace App\Http\Controllers\Barber;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Services\ServicesService;
use App\Http\Controllers\Controller;

class BarberController extends Controller
{
    public function __construct(
        protected ServicesService $service,
    ) {}
    public function index(Request $request)
    {

    }

    public function priceList()
    {
        $services = $this->service->allServices();
        $data['services'] = $services;
        return view('barber.service', $data);
    }

    public function openingHours()
    {
        return view('barber.openingHours');
    }
}
