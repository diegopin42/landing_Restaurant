<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Paso 1: Mostrar la landing page.
     */
    public function index()
    {
        return view('landing');
    }

    /**
     * Paso 1 (Proceso): Validar lead y guardar en sesión.
     */
    public function postStepOne(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        session(['reservation_data' => $validated]);

        return redirect()->route('reservation.details');
    }

    /**
     * Paso 2: Mostrar formulario de detalles (fecha, personas, servicio).
     */
    public function showDetails()
    {
        if (!session()->has('reservation_data')) {
            return redirect()->route('landing');
        }

        return view('reservation_details');
    }

    /**
     * Paso 2 (Proceso): Guardar reserva completa en base de datos.
     */
    public function store(Request $request)
    {
        if (!session()->has('reservation_data')) {
            return redirect()->route('landing');
        }

        $stepOneData = session('reservation_data');

        $stepTwoData = $request->validate([
            'fecha'    => 'required|date|after:today',
            'personas' => 'required|integer|min:1|max:20',
            'servicio' => 'required|string|in:Almuerzo,Cena,Evento',
            'mensaje'  => 'nullable|string|max:1000',
        ]);

        // Combinar datos y crear reserva
        \App\Models\Reservation::create(array_merge($stepOneData, $stepTwoData));

        // Limpiar sesión
        session()->forget('reservation_data');

        return redirect()->route('reservation.thanks');
    }
}
