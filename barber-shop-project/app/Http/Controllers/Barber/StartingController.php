<?php

namespace App\Http\Controllers\Barber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartingController extends Controller
{
    public function index(Request $request)
    {
        return view('start.dashboard');
    }
}
