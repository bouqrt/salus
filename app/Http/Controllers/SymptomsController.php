<?php

namespace App\Http\Controllers;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class SymptomsController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $symptoms=Auth::user()->symptoms;
        return $this->successResponse($symptoms,"liste des symtomes recuperee");
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
    public function store(Request $request)
    {
        //
        $validated=$request->validate([
             'name' => 'required|string|max:255',
            'severity' => 'required|in:mild,moderate,severe',
            'description' => 'nullable|string',
            'date_recorded' => 'required|date',
            'notes' => 'nullable|string'
        ]);
        $symptom=Auth::user()->symptoms()->create($validated);
        return $this->successResponse($symptom,"Symptom enregistrer avec succes",201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $symptom = Auth::user()->symptoms()->findOrFail($id);
        return $this->successResponse($symptom, "Détails du symptôme.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(symptoms $symptoms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
         $symptom = Auth::user()->symptoms()->findOrFail($id);
          $validated=$request->validate([
             'name' => 'required|string|max:255',
            'severity' => 'required|in:mild,moderate,severe',
            'description' => 'nullable|string',
            'date_recorded' => 'required|date',
            'notes' => 'nullable|string'
        ]);
        $symptom->update($validated);
        return $this->successResponse($symptom,"symptome mise a jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $symptom = Auth::user()->symptoms()->findOrFail($id);
        $symptom->delete();
        return $this->successResponse(null,"symprome suprimme");

    }
}
