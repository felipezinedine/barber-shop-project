<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Barber\BarberController;
use App\Http\Controllers\Barber\StartingController;
use App\Http\Controllers\Barber\Schedule\ScheduleController;


Route::get('/', [StartingController::class, 'index']);

Route::prefix('barber')->group(function (){
    Route::get('/price/list', [BarberController::class, 'priceList']);
    Route::get('/opening/hours', [BarberController::class,'openingHours']);
});

Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index']);
    Route::get('/new', [ScheduleController::class, 'newSchedule']);
    Route::get('/{id}/professional/choice', [ScheduleController::class, 'professionalChoice']);
    Route::get('/new/search', [ScheduleController::class, 'search']);
});
