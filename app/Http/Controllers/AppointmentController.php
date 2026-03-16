<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AppointmentController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $appointment=Auth::user()->appoinments()->with('doctor')->get();
        return  $this->successResponse($appointment,"vos rendez-vous");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request) {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:now', 
            'notes' => 'nullable|string'
        ]);

        $appointment = Auth::user()->appointments()->create($validated);
        return $this->successResponse($appointment, "Rendez-vous réservé avec succès.", 201);
     }
    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appoinment=Auth::user()->appoinments()->findOrFail($id);
        $appoinment->delete();
        return $this->successResponse(null,"rendez vous annule");
        //
    }
}
