<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// 1. La landing page con el primer formulario (Paso 1)
Route::get('/', [ReservationController::class, 'index'])->name('landing');

// 2. Procesa el paso 1 y redirige
Route::post('/reservar/paso-1', [ReservationController::class, 'postStepOne'])->name('reservation.step.one');

// 3. La vista donde pide el resto de los datos (Paso 2)
Route::get('/reservar/detalles', [ReservationController::class, 'showDetails'])->name('reservation.details');

// 4. Finaliza la reserva y guarda en DB
Route::post('/reservar/finalizar', [ReservationController::class, 'store'])->name('reservation.finalizar');

// 5. Vista de agradecimiento
Route::get('/gracias', function () {
    return view('thanks');
})->name('reservation.thanks');
