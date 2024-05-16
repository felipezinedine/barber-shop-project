<?php

namespace App\Repositories\Services;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceORM implements ServiceRepository
{
    public function __construct(
        protected Services $services,
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

    public function search($request)
    {
        $query = $this->services->setConnection('mysql')
                      ->where('service', 'like', '%'. $request->search .'%')
                      ->get();
        return $query;
    }

    public function find($id)
    {
        $service = $this->services->setConnection('mysql')->where('id', '=', $id)->first();
        return $service;
    }
}
