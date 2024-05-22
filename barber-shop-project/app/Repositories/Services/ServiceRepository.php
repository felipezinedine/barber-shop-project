<?php

namespace App\Repositories\Services;

interface ServiceRepository
{
    public function allServices();
    public function search($request);
    public function getAll($request);
    public function find($id);
    public function events($id);
    public function eventsAll();
}
