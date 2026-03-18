<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;


class DoctorController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->successResponse(Doctor::all(),"liste des medecins");
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $doctor=Doctor::findOrFail($id);
        return $this->successResponse($doctor,"details de medecin");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function search(Request$request){
        $query=Doctor::query();
        if($request->has('specialty')){
            $query->where('specialty', 'like', '%'.$request->specialty.'%');

        }
         if($request->has('city')){
            $query->where('city', 'like', '%'.$request->city.'%');

        }
        $results=$query->get();
        return $this->successResponse($results,"Resultats de la rechherche ");

    }
}
