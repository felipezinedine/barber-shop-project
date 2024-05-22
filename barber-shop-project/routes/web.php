<?php

use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Barber\BarberController;
use App\Http\Controllers\Barber\StartingController;
use App\Http\Controllers\Barber\ReservationController;
use App\Http\Controllers\Barber\Schedule\ScheduleController;


Route::get('/', [StartingController::class, 'index']);

Route::get('/register', [AdminController::class,'getRegister']);
Route::post('/register', [AdminController::class,'register']);

Route::get('/auth', [AdminController::class, 'getAuth']);
Route::post('/auth', [AdminController::class, 'auth']);

Route::get('/verify-account', [AdminController::class, 'verify']);
Route::post('/verify-account', [AdminController::class, 'validationCode']);

Route::get('/logout', [AdminController::class, 'logout']);

Route::prefix('barber')->group(function (){
    Route::get('/price/list', [BarberController::class, 'priceList']);
    Route::get('/opening/hours', [BarberController::class,'openingHours']);
});

Route::prefix('schedule')->group(function () {

    Route::get('/', [ScheduleController::class, 'index']);
    Route::get('/new', [ScheduleController::class, 'newSchedule']);
    Route::get('/events/all', [ScheduleController::class,'eventsAll']);
    Route::get('/add/events', [ScheduleController::class, 'lastStep']);
    Route::get('/events/weekly/{profId}', [ScheduleController::class, 'getWeeklyEvents']);
    Route::get('/{cut}/professional/choice/{professional}', [ScheduleController::class,'scheduling']);
    Route::get('/{id}/professional/choice', [ScheduleController::class, 'professionalChoice'])->middleware(Auth::class);

    Route::post('/completed', [ScheduleController::class, 'scheduleCompleted']);
});

Route::prefix('reservations')->middleware(Auth::class)->group(function () {
    Route::get('/', [ReservationController::class, 'index']);
    Route::get('/cancel/{id}', [ReservationController::class, 'delete']);
});
