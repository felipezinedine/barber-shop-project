<?php

namespace App\Repositories\Services;

use App\Models\Services;
use App\Models\Scheduling;
use Illuminate\Http\Request;

class ServiceORM implements ServiceRepository
{
    public function __construct(
        protected Services $services,
        protected Scheduling $scheduling,
    ) {}

    public function getAll($request)
    {
        $services = $this->services->setConnection('mysql')->where(function ($query) use ($request) {
            if(isset($request->search) && $request->search != null){
                $query->where('service', 'like', '%'. $request->search .'%');
            }
        })->get();

        return $services;
    }
    public function allServices()
    {
        $services = $this->services->setConnection('mysql')->all();
        return $services;
    }

    public function find($id)
    {
        $service = $this->services->setConnection('mysql')
                        ->where('id', '=', $id)
                        ->first();
        return $service;
    }

    public function events($id)
    {
        $events = $this->scheduling->setConnection('mysql')
                       ->where('professional_id', '=', $id)
                       ->with('services')
                       ->get();
        return $events;
    }

    public function eventsAll()
    {
        $events = $this->scheduling->setConnection('mysql')
                                   ->all();
        return $events;
    }
}
